-- used to create the db and table + insert statements

drop database test;
create database test;
use test;


create table member(
	email varchar(254) not null primary key,
	-- dropped the long name (age_as_integer) for convenience
  age int(3),
  -- set all values to male as it is irrelevant to the assignment
  gender varchar(1) not null
);

insert into member(email, age, gender) values('a@b.c', '10', 'm');
insert into member(email, age, gender) values('b@b.c', '10', 'm');
insert into member(email, age, gender) values('c@b.c', '10', 'm');
insert into member(email, age, gender) values('d@b.c', '20', 'm');
insert into member(email, age, gender) values('e@b.c', '20', 'm');
insert into member(email, age, gender) values('f@b.c', '20', 'm');
insert into member(email, age, gender) values('g@b.c', '20', 'm');
insert into member(email, age, gender) values('h@b.c', '20', 'm');
insert into member(email, age, gender) values('i@b.c', '30', 'm');
insert into member(email, age, gender) values('j@b.c', '30', 'm');
insert into member(email, age, gender) values('k@b.c', '30', 'm');
insert into member(email, age, gender) values('l@b.c', '30', 'm');
insert into member(email, age, gender) values('m@b.c', '40', 'm');
insert into member(email, age, gender) values('n@b.c', '50', 'm');
insert into member(email, age, gender) values('o@b.c', '50', 'm');
insert into member(email, age, gender) values('p@b.c', '50', 'm');
insert into member(email, age, gender) values('q@b.c', '50', 'm');
insert into member(email, age, gender) values('r@b.c', '50', 'm');


create table visits(
  id varchar(10) not null auto_increment,
  timestamp timestamp not null default current_timestamp,
  email varchar(254) not null,
  first_time tinyint(1) not null default 1,
  primary key (id)
);

insert into visits(email) values('a@b.c');
insert into visits(email) values('b@b.c');
insert into visits(email) values('c@b.c');
insert into visits(email) values('d@b.c');
insert into visits(email) values('e@b.c');
insert into visits(email) values('f@b.c');
insert into visits(email) values('g@b.c');
insert into visits(email) values('h@b.c');
insert into visits(email) values('i@b.c');
insert into visits(email) values('j@b.c');
insert into visits(email) values('k@b.c');
insert into visits(email) values('l@b.c');
insert into visits(email) values('m@b.c');
insert into visits(email) values('n@b.c');
insert into visits(email) values('o@b.c');
insert into visits(email) values('p@b.c');
insert into visits(email) values('q@b.c');
insert into visits(email) values('r@b.c');
insert into visits(email) values('s@b.c');
insert into visits(email) values('t@b.c');
insert into visits(email) values('u@b.c');
insert into visits(email) values('v@b.c');
insert into visits(email) values('w@b.c');
insert into visits(email) values('x@b.c');