

-- # ─────────────────────────────────────────────────────────────────────
-- # auto primary key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 INTEGER          not null PRIMARY KEY AUTO_INCREMENT | # MySQL
    f1 INTEGER          not null PRIMARY KEY AUTOINCREMENT  | # SQLite
    f1 SERIAL           not null PRIMARY KEY,                 # PostgreSQL
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null
);

-- # ─────────────────────────────────────────────────────────────────────
-- # constraint primary key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # constraint unique
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_uniq UNIQUE (f2)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # indexes
-- # ─────────────────────────────────────────────────────────────────────

CREATE INDEX idx ON test (f3);
CREATE UNIQUE INDEX idx_uniq ON test (f3);



-- #############
-- ### MySQL ###
-- #############


-- # ─────────────────────────────────────────────────────────────────────
-- # auto (primary key + autoincrement)
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 INTEGER          not null PRIMARY KEY AUTO_INCREMENT,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null
);

create table test (
    f1 INTEGER          not null AUTO_INCREMENT,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1)
);

create table test (
    f1 INTEGER          not null AUTO_INCREMENT,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY (f1)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # primary key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1)
);

create table test (
    f1 integer          not null PRIMARY KEY,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null
);
  
create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY(f1)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # primary key multiple
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1, f2)
);

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY(f1, f2)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # unique key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_uniq UNIQUE (f2)
);

create table test (
    f1 integer          not null,
    f2 integer      default null UNIQUE,
    f3 integer      default null,
    f4 varchar(255) default null
);

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    UNIQUE(f2)
);

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    UNIQUE KEY idx_uniq (f2)
);



-- ##############
-- ### SQLite ###
-- ##############


-- # ─────────────────────────────────────────────────────────────────────
-- # auto (primary key + autoincrement)
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 INTEGER          not null PRIMARY KEY AUTOINCREMENT,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null
);

-- # ─────────────────────────────────────────────────────────────────────
-- # primary key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1)
);

create table test (
    f1 integer          not null PRIMARY KEY,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null
);

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY(f1)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # primary key multiple
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1, f2)
);

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY(f1, f2)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # unique key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_uniq UNIQUE (f2)
);



-- ##################
-- ### PostgreSQL ###
-- ##################


--                !!! PostgreSQL is no longer supported !!!


-- # ─────────────────────────────────────────────────────────────────────
-- # auto (primary key + autoincrement)
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 SERIAL           not null PRIMARY KEY,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null
);

create table test (
    f1 SERIAL           not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1)
);

create table test (
    f1 SERIAL           not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY (f1)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # primary key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1)
);

create table test (
    f1 integer          not null PRIMARY KEY,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null
);

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY(f1)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # primary key multiple
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_prim PRIMARY KEY (f1, f2)
);

create table test (
    f1 integer          not null,
    f2 integer          not null,
    f3 integer      default null,
    f4 varchar(255) default null,
    PRIMARY KEY(f1, f2)
);

-- # ─────────────────────────────────────────────────────────────────────
-- # unique key
-- # ─────────────────────────────────────────────────────────────────────

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    CONSTRAINT idx_uniq UNIQUE (f2)
);

create table test (
    f1 integer          not null,
    f2 integer      default null UNIQUE,
    f3 integer      default null,
    f4 varchar(255) default null
);

create table test (
    f1 integer          not null,
    f2 integer      default null,
    f3 integer      default null,
    f4 varchar(255) default null,
    UNIQUE(f2)
);


