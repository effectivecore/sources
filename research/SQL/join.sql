


SELECT
  	relations_role_ws_user.*,
  	roles.title,
  	users.nick
FROM relations_role_ws_user
LEFT OUTER JOIN roles
    ON relations_role_ws_user.id_role = roles.id
LEFT OUTER JOIN users
    ON relations_role_ws_user.id_user = users.id
WHERE id_user = 1;


