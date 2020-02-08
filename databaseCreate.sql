drop database iq;
create database iq;
use iq;


create table class(
	id int auto_increment primary key,
	name varchar(50)
);

create table user(
	id int auto_increment primary key,
	username varchar(20),
	password varchar(20),
	name varchar(50),
	email varchar(50),
	status int,
	class int,
	image_profile varchar(50) default 'Asset/Images/Profpic/profile.png',
	FOREIGN KEY (class) REFERENCES class(id)
	-- status 0 = admin
	-- status 1 = sub admin (buddy)
	-- status 2 = user (newbie)
);

insert into class (name) values("HR");
insert into class (name) values("IT");
insert into user (username, password, name, email, status, class) values ("admin", "adminadmin", "superHR", "hr@hr.com", 0, 1);
insert into user (username, password, name, email, status, class) values ("budy", "budybudy", "budi budiman", "budi@hr.com", 1, 2);
insert into user (username, password, name, email, status, class) values ("newbie", "newbie", "newbie noob", "noob@hr.com", 2, 2);

