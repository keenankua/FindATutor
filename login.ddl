DROP TABLE if exists login_info cascade;

CREATE TABLE login_info (
    Email varchar(255) primary key,
    Password varchar(225),
    FirstName varchar(225),
    LastName varchar(225),
    is_active smallint DEFAULT 0,
    is_verified smallint DEFAULT 0
);

INSERT INTO login_info VALUES('ad@login.com', 'admin', 'First', 'Last');
