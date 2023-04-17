drop schema keyper;
create database keyper;
use keyper;

create table staff (
	id int unsigned not null primary key auto_increment,
    boss tinyint default 0,
    name varchar(150) not null unique,
    password varchar(100) not null,
    firstLogin char(1) default 1
);

create table keyss (
	id int unsigned not null primary key auto_increment,
    label varchar(50) unique not null
);

create table cpfs (
	id int unsigned not null primary key auto_increment,
    number char(11) not null unique
);

create table users (
	id int unsigned not null primary key auto_increment,
    name varchar(150) not null,
    id_cpf int unsigned not null unique,
    constraint users_cpfs foreign key(id_cpf) references cpfs(id)
);

create table logs(
	id int unsigned not null primary key auto_increment,
    id_staff int unsigned not null,
    id_key int unsigned not null,
    id_user int unsigned not null,
    date_taken datetime not null default now(),
    returned int unsigned not null default 0,
    id_staff_returned int unsigned default null,
    date_returned datetime default null,
    constraint log_staff foreign key(id_staff) references staff(id),
    constraint log_key foreign key(id_key) references keyss(id),
    constraint log_user foreign key(id_user) references users(id)
);

insert into staff(boss, name, password, firstLogin) values(1, 'admin', md5('admin'), 0);