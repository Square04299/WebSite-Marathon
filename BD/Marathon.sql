
CREATE DATABASE IF NOT EXISTS marathon DEFAULT CHARACTER SET utf8;
USE marathon;


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
  R_ID integer not null,
  R_LIEUX varchar(100) primary key not null
);

create table T_COURSE (
  C_ID_COURSE integer primary key auto_increment not null,
  C_NAME varchar(100) not null,
  C_LIEUX_DEPART varchar(100) not null,
  C_LIEUX_ARRIVER varchar(100) not null,
  C_DATE_DEBUT datetime,
  C_END boolean default true,
  CONSTRAINT FK_LIEUX_DEPART foreign key(C_LIEUX_DEPART) references T_REGION(R_LIEUX),
  CONSTRAINT FK_LIEUX_ARRIVER foreign key(C_LIEUX_ARRIVER) references T_REGION(R_LIEUX)
);

create table T_PARTICIPANT (
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
VALUES ('chris','chris','FRA','0');
INSERT INTO T_USER (U_NOM,U_PASSWORD,U_NATIONALITE,U_ADMIN)
VALUES ('nvs','nvs','BEL','0');
INSERT INTO T_USER (U_NOM,U_PASSWORD,U_NATIONALITE,U_ADMIN)
VALUES ('guest','guest','ENG','0');
INSERT INTO T_USER (U_NOM,U_PASSWORD,U_NATIONALITE,U_ADMIN)
VALUES ('admin','admin','BEL','1');


INSERT INTO T_REGION(R_ID,R_LIEUX)
VALUES ('01','Bruxelles'),
        ('02','Mons'),
        ('03','Londres'),
        ('04','Liverpool'),
        ('05','Paris'),
        ('06','Lyon');

INSERT INTO T_COURSE (C_NAME,C_LIEUX_DEPART,C_LIEUX_ARRIVER,C_DATE_DEBUT,C_END)
VALUES ('SUNLIGHT','Bruxelles','Mons','2020-4-17','0'),
        ('ECO RUN','Paris','Lyon','2020-5-17','1'),
        ('TEA','Liverpool','Londres','2020-4-17','0');

INSERT INTO T_PARTICIPANT (P_ID_COURSE,P_PARTICIPANT,P_CLASSEMENT,P_DATE)
VALUES ('1','1','3','2020-4-5');
INSERT INTO T_PARTICIPANT (P_ID_COURSE,P_PARTICIPANT,P_CLASSEMENT,P_DATE)
VALUES ('2','1','3','2020-4-5');
INSERT INTO T_PARTICIPANT (P_ID_COURSE,P_PARTICIPANT,P_CLASSEMENT,P_DATE)
VALUES ('3','1','1','2020-4-5');
INSERT INTO T_PARTICIPANT (P_ID_COURSE,P_PARTICIPANT,P_CLASSEMENT,P_DATE)
VALUES ('1','3','1','2020-4-5');
INSERT INTO T_PARTICIPANT (P_ID_COURSE,P_PARTICIPANT,P_CLASSEMENT,P_DATE)
VALUES ('1','4','2','2020-4-5');
