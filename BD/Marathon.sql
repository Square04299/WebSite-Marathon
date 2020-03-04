
DROP DATABASE marathon;
CREATE DATABASE IF NOT EXISTS marathon DEFAULT CHARACTER SET utf8;
USE marathon;

drop table if exists T_NATIONALITE;
drop table if exists T_USER;
drop table if exists T_REGION;
drop table if exists T_COURSE;
drop table if exists T_PATICIPANT;


create table T_NATIONALITE (
  N_NATIONALITE varchar(3) primary key not null
);

create table T_USER (
  U_NOM varchar(100) not null,
  U_ID integer primary key auto_increment,
  U_PASSWORD varchar(10) not null,
  U_NATIONALITE varchar(3),
  U_ADMIN boolean default false,
	CONSTRAINT FK_NATIONALITE foreign key(U_NATIONALITE) references T_NATIONALITE(N_NATIONALITE)
);

create table T_REGION (
  R_LIEUX varchar(100) primary key not null
);

create table T_COURSE (
  C_ID_COURSE integer primary key not null,
  C_LIEUX varchar(100) not null,
  C_DISTANCE integer not null,
  CONSTRAINT FK_LIEUX foreign key(C_LIEUX) references T_REGION(R_LIEUX)
);

create table T_PATICIPANT (
  P_ID_COURSE integer not null,
  P_PARTICIPANT integer not null,
  P_CLASSEMENT integer not null,
  P_DATE datetime,
  CONSTRAINT FK_ID_COURSE foreign key(P_ID_COURSE) references T_COURSE(C_ID_COURSE),
  CONSTRAINT FK_PARTICIPANT foreign key(P_PARTICIPANT) references T_USER(U_ID)
);

INSERT INTO T_NATIONALITE(N_NATIONALITE) values ('BEL');
INSERT INTO T_NATIONALITE(N_NATIONALITE) values ('FRA');
INSERT INTO T_NATIONALITE(N_NATIONALITE) values ('ENG');

INSERT INTO T_USER (U_NOM,U_PASSWORD,U_NATIONALITE,U_ADMIN)
VALUES ('user','user','BEL','0');
INSERT INTO T_USER (U_NOM,U_PASSWORD,U_NATIONALITE,U_ADMIN)
VALUES ('admin','admin','BEL','1');

INSERT INTO T_REGION
VALUES ('Bruxelle'),
        ('Mons'),
        ('Londre'),
        ('Liverpool'),
        ('Paris'),
        ('Lyon');

