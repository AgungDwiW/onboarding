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

create table quest(
	id int auto_increment primary key,
	title varchar (50),
	subtitle varchar (100),
	is_main boolean,
	type varchar(20),
	stage int,
	issued int,
	FOREIGN key (issued) REFERENCES user(id)
	-- type:
	-- 		- submit
	-- 		- test
	--		- quisioner
);

create table test_question(
	id int auto_increment primary key,
	id_quest int,
	question varchar (50),
	FOREIGN key (id_quest) REFERENCES quest(id)
);

create table test_question_choice(
	id int auto_increment primary key,
	id_question int,
	choice varchar(50),
	is_true boolean,
	FOREIGN key (id_question) REFERENCES test_question(id)
);

create table test_answer(
	id_user int,
	id_choice int,
	is_true boolean,
	FOREIGN key (id_user) REFERENCES user(id),
	FOREIGN key (id_choice) REFERENCES test_question_choice(id)
);

create table submit_question(
	id int auto_increment primary key,
	id_quest int,
	id_user int,
	question varchar(100),
	FOREIGN key (id_quest) REFERENCES quest(id),
	FOREIGN key (id_user) REFERENCES user(id)
);

create table quest_progression(
	id_user int,
	id_quest int,
	progress boolean,
	FOREIGN key (id_user) REFERENCES user(id),
	FOREIGN key (id_quest) REFERENCES quest(id)
);

create table submit_answer(
	id int auto_increment primary key,
	id_user int,
	id_quest int,
	answer text,
	FOREIGN key (id_quest) REFERENCES quest (id),
	FOREIGN key (id_user) REFERENCES user (id)
)

insert into quest(title, subtitle, is_main, type, stage) values ("Test for new adventurer", "This vilage is already well fed and comfortable to live in but best thing won't last forever, 
		    we need champion to protect our vilage from future threat", 1, "test", 1);

insert into quest(title, subtitle, is_main, type, stage) values ("Test for new adventurer", "This vilage is already well fed and comfortable to live in but best thing won't last forever, 
		    we need champion to protect our vilage from future threat", 1, "test", 1);
