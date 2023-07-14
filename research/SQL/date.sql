


-- #############
-- ### MySQL ###
-- #############

-- range:

-- TIME     : '00:00:00'            - '23:59:59'
-- DATE     : '0000-01-01'          - '9999-12-31'
-- DATETIME : '0000-01-01 00:00:00' - '9999-12-31 23:59:59'
-- TIMESTAMP: '1970-01-01 00:00:01' - '2038-01-19 03:14:07'

-- timezone:

-- TIMESTAMP converts from the current time zone to UTC for storage
-- and UTC to the current time zone for retrieval.
-- Server's time is the current time zone by default.
-- DATETIME not converted to the UTC.



-- ##############
-- ### SQLite ###
-- ##############

-- range:

-- TIME     : 'HH:MM:SS'            - not controlled
-- DATE     : 'YYYY-MM-DD'          - not controlled
-- DATETIME : 'YYYY-MM-DD HH:MM:SS' - not controlled
-- TIMESTAMP: 'YYYY-MM-DD HH:MM:SS' - not controlled

-- timezone:

-- Not used - stored as is.



-- ##################
-- ### MySQL test ###
-- ##################

DROP TABLE IF EXISTS test;

CREATE TABLE test (
    id int(11) unsigned not null primary key auto_increment,
    f_time      time      default null,
    f_date      date      default null,
    f_datetime  datetime      not null,
    f_timestamp timestamp     not null
);

SET time_zone = "+0:00";

INSERT INTO test (f_time, f_date, f_datetime, f_timestamp)
VALUES ('12:34:56', '2000-01-01', '2000-01-01 12:34:56', '2000-01-01 12:34:56');

SELECT
    unix_timestamp(f_time)      as f_time,      f_time,
    unix_timestamp(f_date)      as f_date,      f_date,
    unix_timestamp(f_datetime)  as f_datetime,  f_datetime,
    unix_timestamp(f_timestamp) as f_timestamp, f_timestamp
FROM test ORDER BY id;

SET time_zone = "+3:00";

INSERT INTO test (f_time, f_date, f_datetime, f_timestamp)
VALUES ('12:34:56', '2000-01-01', '2000-01-01 12:34:56', '2000-01-01 12:34:56');

SELECT
    unix_timestamp(f_time)      as f_time,      f_time,
    unix_timestamp(f_date)      as f_date,      f_date,
    unix_timestamp(f_datetime)  as f_datetime,  f_datetime,
    unix_timestamp(f_timestamp) as f_timestamp, f_timestamp
FROM test ORDER BY id;


-- MySQL Result:

-- ─────────────────────────────────────────────────────────────────────────
-- id |     f_time |              f_time |      f_date |              f_date
-- ─────────────────────────────────────────────────────────────────────────
--  1 | 1510911296 |            12:34:56 |   946674000 |          2000-01-01
--  2 | 1510911296 |            12:34:56 |   946674000 |          2000-01-01

-- ─────────────────────────────────────────────────────────────────────────
-- id | f_datetime |          f_datetime | f_timestamp |         f_timestamp
-- ─────────────────────────────────────────────────────────────────────────
--  1 |  946719296 | 2000-01-01 12:34:56 |   946730096 | 2000-01-01 15:34:56
--  2 |  946719296 | 2000-01-01 12:34:56 |   946719296 | 2000-01-01 12:34:56



-- ###################
-- ### SQLite test ###
-- ###################

DROP TABLE IF EXISTS test;

CREATE TABLE test (
    id integer not null primary key autoincrement,
    f_time      time      default null,
    f_date      date      default null,
    f_datetime  datetime      not null,
    f_timestamp timestamp     not null
);

INSERT INTO test (f_time, f_date, f_datetime, f_timestamp)
VALUES ('12:34:56', '2000-01-01', '2000-01-01 12:34:56', '2000-01-01 12:34:56');

SELECT
    strftime('%H:%M:%S',          f_time,      'localtime') as f_time,      f_time,
    strftime('%Y-%m-%d',          f_date,      'localtime') as f_date,      f_date,
    strftime('%Y-%m-%d %H:%M:%S', f_datetime,  'localtime') as f_datetime,  f_datetime,
    strftime('%Y-%m-%d %H:%M:%S', f_timestamp, 'localtime') as f_timestamp, f_timestamp
FROM test UNION
SELECT
    strftime('%s', f_time)      as f_time,      f_time,
    strftime('%s', f_date)      as f_date,      f_date,
    strftime('%s', f_datetime)  as f_datetime,  f_datetime,
    strftime('%s', f_timestamp) as f_timestamp, f_timestamp
FROM test UNION
SELECT
    strftime('%s', f_time,      'localtime') as f_time,      f_time,
    strftime('%s', f_date,      'localtime') as f_date,      f_date,
    strftime('%s', f_datetime,  'localtime') as f_datetime,  f_datetime,
    strftime('%s', f_timestamp, 'localtime') as f_timestamp, f_timestamp
FROM test;


-- SQLite Result:

-- ───────────────────────────────────────────────────────────────────────────────────────────
-- id |               f_time |              f_time |              f_date |              f_date
-- ───────────────────────────────────────────────────────────────────────────────────────────
--    |             14:34:56 |            12:34:56 |          2000-01-01 |          2000-01-01
--    |            946730096 |            12:34:56 |           946684800 |          2000-01-01
--    |            946737296 |            12:34:56 |           946692000 |          2000-01-01

-- ───────────────────────────────────────────────────────────────────────────────────────────
-- id |           f_datetime |          f_datetime |         f_timestamp |         f_timestamp
-- ───────────────────────────────────────────────────────────────────────────────────────────
--    |  2000-01-01 14:34:56 | 2000-01-01 12:34:56 | 2000-01-01 14:34:56 | 2000-01-01 15:34:56
--    |            946730096 | 2000-01-01 12:34:56 |           946730096 | 2000-01-01 12:34:56
--    |            946737296 | 2000-01-01 12:34:56 |           946737296 | 2000-01-01 12:34:56


