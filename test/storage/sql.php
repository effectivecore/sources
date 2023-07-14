<?php

namespace effcore;


$storage = storage::get(
    entity::get('page')->storage_name
);



# ─────────────────────────────────────────────────────────────────────
# install
# ─────────────────────────────────────────────────────────────────────

$demo_types         = entity::get('demo_types'        );
$demo_autoincrement = entity::get('demo_autoincrement');
$demo_constraints   = entity::get('demo_constraints'  );
$demo_indexes       = entity::get('demo_indexes'      );
$storage->entity_install($demo_types        );
$storage->entity_install($demo_autoincrement);
$storage->entity_install($demo_constraints  );
$storage->entity_install($demo_indexes      );



# ─────────────────────────────────────────────────────────────────────
# transactions
# ─────────────────────────────────────────────────────────────────────

$storage->transaction_begin();
(new instance('tree', ['title' => 'tree 1']))->insert();
(new instance('tree', ['title' => 'tree 2']))->insert();
$storage->transaction_roll_back();

$storage->transaction_begin();
(new instance('tree', ['title' => 'tree 3']))->insert();
(new instance('tree', ['title' => 'tree 4']))->insert();
(new instance('tree', ['title' => 'tree 5']))->insert();
$storage->transaction_commit();



# ─────────────────────────────────────────────────────────────────────
# join
# ─────────────────────────────────────────────────────────────────────

# SELECT
#   users.*,
#   relations_role_ws_user.id_role,
#   roles.title
# FROM users
# LEFT OUTER JOIN relations_role_ws_user ON users.id = relations_role_ws_user.id_user
# LEFT OUTER JOIN roles                  ON relations_role_ws_user.id_role = roles.id
# WHERE users.id = 1;

$admin_roles = entity::get('user')->instances_select([
    'fields'      => ['id_!f' => '~user.id'],
    'join_fields' => ['id_role_!f' => '~relation_role_ws_user.id_role', 'title_!f' => '~role.title'],
    'join'        => ['relation_role_ws_user' => ['type' => 'LEFT OUTER JOIN', 'target_!t' => '~relation_role_ws_user', 'on' => 'ON', 'left_!f' => '~user.id',                       'operator' => '=', 'right_!f' => '~relation_role_ws_user.id_user'],
                      'role'                  => ['type' => 'LEFT OUTER JOIN', 'target_!t' => '~role'                 , 'on' => 'ON', 'left_!f' => '~relation_role_ws_user.id_role', 'operator' => '=', 'right_!f' => '~role.id'                      ]],
    'conditions'  => ['id_!f' => '~user.id', 'operator' => '=', 'id_!v' => 1],
    'order'       => ['title_!f' => '~role.title', 'direction' => 'ASC'],
    'limit'       => 10,
    'offset'      => 0
]);



# ─────────────────────────────────────────────────────────────────────
# group
# ─────────────────────────────────────────────────────────────────────

# SELECT id_answer, count(*) as total
# FROM poll_votes
# WHERE id_poll = 1
# GROUP BY id_answer;

$result = entity::get('poll_vote')->instances_select([
    'fields'     => ['id_!f' => 'id_answer', 'count' => ['function_begin' => 'count(', 'function_field' => '*', 'function_end' => ')', 'alias_begin' => 'as', 'alias' => 'total']],
    'conditions' => ['id_poll_!f' => 'id_poll', 'id_poll_operator' => '=', 'id_poll_!v' => 1],
    'group'      => ['id_!f' => 'id_answer']
]);



# ─────────────────────────────────────────────────────────────────────
# max
# ─────────────────────────────────────────────────────────────────────

# SELECT max(id_user) as max
# FROM poll_votes;

$max_id_user = entity::get('poll_vote')->instances_select(['fields' => ['max' => [
    'function_begin'    => 'max(',
    'function_field_!f' => 'id_user',
    'function_end'      => ')',
    'alias_begin'       => 'as',
    'alias'             => 'max']],
])[0]->max;



# ─────────────────────────────────────────────────────────────────────
# in
# ─────────────────────────────────────────────────────────────────────

# DELETE FROM poll_votes
# WHERE id_poll in ('200', '300');

entity::get('poll_vote')->instances_select(['conditions' => [
    'id_answer_!f' => 'id_answer',
    'in_begin'     => 'in (',
    'in_!,'        => [
        'in_value_1_!v' => 200,
        'in_value_2_!v' => 300],
    'in_end' => ')'
]]);

entity::get('poll_vote')->instances_select(['conditions' => [
    'id_answer_!f' => 'id_answer',
    'in_begin'     => 'in (',
    'in_!a'        => [200, 300],
    'in_end'       => ')'
]]);



# ─────────────────────────────────────────────────────────────────────
# pure query + blob
# ─────────────────────────────────────────────────────────────────────

$storage->query([
    'action'          => 'INSERT',
    'action_subtype'  => 'INTO',
    'target_!t'       => '~demo_types',
    'fields_begin'    => '(',
    'fields_!,'       => ['id_!f' => 'id', 'f_blob_!f' => 'f_blob'],
    'fields_end'      => ')',
    'values_begin'    => 'VALUES (',
    'values_!,'       => ['id_!v' => 1000, 'f_blob_!v' => str_repeat('abcdefghijklmnopqrstuvwxyz0123456789', 1000)],
    'values_end'      => ')'
]);

$result = $storage->query([
    'action'          => 'SELECT',
    'fields_!,'       => ['all_!f' => 'demo_types.*'],
    'target_begin'    => 'FROM',
    'target_!t'       => '~demo_types',
    'condition_begin' => 'WHERE',
    'condition'       => ['id_!f' => 'id', '=', 'id_!v' => 1000]
]);

print_R($result);

$storage->query([
    'action'          => 'DELETE',
    'target_begin'    => 'FROM',
    'target_!t'       => '~demo_types',
    'condition_begin' => 'WHERE',
    'condition'       => ['id_!f' => 'id', '=', 'id_!v' => 1000]
]);



###################
### performance ###
###################

$driver = 'mysql'; # mysql | sqlite

switch ($driver) {
    case 'mysql':
        $storage = new storage_sql_pdo();
        $storage->driver = 'mysql';
        $storage->credentials = new \stdClass();
        $storage->credentials->host = '[::]';
        $storage->credentials->port = 3306;
        $storage->credentials->database = 'effcore';
        $storage->credentials->login = 'root';
        $storage->credentials->password = '123';
        break;
    case 'sqlite':
        $storage = new storage_sql_pdo();
        $storage->driver = 'sqlite';
        $storage->credentials = new \stdClass();
        $storage->credentials->file_name = 'data.sqlite';
        break;
}

$test = $storage->test(
    $storage->driver,
    $storage->credentials
);

if ($test === true) {
    $result = '';
    timer::tap('siud');
    for ($i = 3; $i < 1000; $i++) {
        $c_nick = 'test_'.$i;
        $c_mail = 'test_'.$i.'@example.com';
        $user = new instance('user', [
            'email'   => $c_mail,
            'nick'    => $c_nick,
            'created' => '2030-01-01 00:00:00',
            'updated' => '2030-01-01 00:00:00'
        ]);
        if ($storage->instance_insert($user)) {
            $result.= 'user was inserted with nick = "'.$c_nick.'" and id = "'.$user->id.'"'.NL;
            $user->password_hash = $i;
            if ($storage->instance_update($user)) $result.= 'user was updated'.NL;
            if ($storage->instance_delete($user)) $result.= 'user was deleted'.NL;
        } else {
            $result.= 'cannot insert user with nick = '.$c_nick.NL;
        }
    }
    timer::tap('siud');
    $result = 'time: '.timer::period_get('siud', 0, 1).' sec.'.NL.$result;
    print $result;
} else {
    print 'error message: '.$test['message'].br;
    print 'error code: '.   $test['code'];
}


 # driver | s + i + u + d | select only
 # ─────────────────────────────────────────────────────────────────────
 # mysql  | 1.225338 sec. | 0.001648 sec.
 # sqlite | 2.964928 sec. | 0.001655 sec.


