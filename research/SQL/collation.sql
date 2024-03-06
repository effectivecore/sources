


-- #############
-- ### MySQL ###
-- #############


DROP TABLE IF EXISTS test;

CREATE TABLE test (
    id integer not null primary key,
    f_nocase varchar(256) COLLATE UTF8_GENERAL_CI default '', /* by default */
    f_binary varchar(256) COLLATE UTF8_BIN        default ''
) CHARSET=utf8;

INSERT INTO test (id, f_nocase, f_binary) VALUES (1, 'aaa', 'aaa');
INSERT INTO test (id, f_nocase, f_binary) VALUES (2, 'AAA', 'AAA');

SELECT * FROM test WHERE f_nocase = 'aaa';
SELECT * FROM test WHERE f_nocase = 'AAA';
SELECT * FROM test WHERE f_binary = 'aaa';
SELECT * FROM test WHERE f_binary = 'AAA';



-- ##############
-- ### SQLite ###
-- ##############


DROP TABLE test;

CREATE TABLE test (
    id integer not null primary key,
    f_nocase text COLLATE NOCASE,
    f_binary text COLLATE BINARY /* by default */
);

INSERT INTO test (id, f_nocase, f_binary) VALUES (1, 'aaa', 'aaa');
INSERT INTO test (id, f_nocase, f_binary) VALUES (2, 'AAA', 'AAA');

SELECT * FROM test WHERE f_nocase = 'aaa';
SELECT * FROM test WHERE f_nocase = 'AAA';
SELECT * FROM test WHERE f_binary = 'aaa';
SELECT * FROM test WHERE f_binary = 'AAA';



-- ###############
-- ### Results ###
-- ###############


-- Result 1
-- ───────────────────
-- f_nocase | f_binary
-- ───────────────────
-- aaa      | aaa
-- AAA      | AAA


-- Result 2
-- ───────────────────
-- f_nocase | f_binary
-- ───────────────────
-- aaa      | aaa
-- AAA      | AAA


-- Result 3
-- ───────────────────
-- f_nocase | f_binary
-- ───────────────────
-- aaa      | aaa


-- Result 4
-- ───────────────────
-- f_nocase | f_binary
-- ───────────────────
-- AAA      | AAA


