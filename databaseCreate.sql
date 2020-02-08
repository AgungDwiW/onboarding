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
	credit int,
	image_profile varchar(50) default 'Asset/Images/Profpic/profile.png',
	FOREIGN KEY (class) REFERENCES class(id)
	-- status 0 = admin
	-- status 1 = sub admin (buddy)
	-- status 2 = user (newbie)
);

create table buddy_newbie(
	id_newbie int,
	id_buddy int,
	FOREIGN key (id_newbie) REFERENCES user (id),
	FOREIGN key (id_buddy) REFERENCES user (id)
);

insert into class (name) values("HR");
insert into class (name) values("IT");
insert into user (username, password, name, email, status, class) values ("admin", "adminadmin", "superHR", "hr@hr.com", 0, 1);
insert into user (username, password, name, email, status, class, credit) values ("budy", "budybudy", "budi budiman", "budi@hr.com", 1, 2, 25);
insert into user (username, password, name, email, status, class) values ("newbie", "newbie", "newbie noob", "noob@hr.com", 2, 2);

insert into buddy_newbie(id_newbie, id_buddy) values (3,2);

create table quest(
	id int auto_increment primary key,
	title varchar (100),
	subtitle varchar (500),
	is_main boolean,
	type varchar(20),
	stage int,
	issued_by int,
	deadline int,
	reward int,
	issued_to int,
	FOREIGN key (issued_to) REFERENCES user(id),
	FOREIGN key (issued_by) REFERENCES user(id)
	-- type:
	-- 		- submit
	-- 		- test
	--		- quisioner
);

create table submit_quest(
	id int auto_increment primary key,
	id_user int,
	id_quest int,
	file text,
	FOREIGN key (id_quest) REFERENCES quest (id),
	FOREIGN key (id_user) REFERENCES user (id)
);

insert into quest(title, subtitle, is_main, type, stage, issued_by, reward ) values ("Take a photo of your new work place", 
	"Welcome to BCA we are happy to have you aboard. How is it? have you reached your work station? Please submit a photo of your workstation for us to see.",
	 1, "submit", 1, 1, 10);

insert into quest(title, subtitle, is_main, type, stage, issued_by, reward ) values ("Have you meet your neighbour?", 
	"He/She is your closest coleague for some time while you're stationed at your current workstation. Have you meet them? If so, please submit the photo of three of you together!",  
	1, "submit", 1, 1, 10);

insert into quest(title, subtitle, is_main, type, stage, issued_by, reward, issued_to ) values ("Hello there, I'm your buddy!", 
	"My name is Budi Budiman, hello I'm assigned as your buddy! I'm as happy as I am but at the same time I'm also sleepy, i haven't sleep last night because of my neighbour. Can you bring me a cup of coffe? I will wait at my desk at 6th row. Let's take a pic together to comemorate your new job!", 
	1, "submit", 0, 2, 5, 3);