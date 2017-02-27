-- used to create the db and table + insert statements

drop database if exists NextBee;
create database NextBee;
use NextBee;


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
  id int not null auto_increment,
  timestamp int not null,
  email varchar(254) not null,
  first_time tinyint(1) not null default 1,
  primary key (id)
);

insert into visits(email, timestamp) values('a@b.c', 1485876459);
insert into visits(email, timestamp) values('b@b.c', 1485876559);
insert into visits(email, timestamp) values('c@b.c', 1485876579);
insert into visits(email, timestamp) values('d@b.c', 1485876589);
insert into visits(email, timestamp) values('e@b.c', 1485876659);
insert into visits(email, timestamp) values('f@b.c', 1485876669);
insert into visits(email, timestamp) values('g@b.c', 1485876699);
insert into visits(email, timestamp) values('h@b.c', 1485876759);
insert into visits(email, timestamp) values('i@b.c', 1485876779);
insert into visits(email, timestamp) values('j@b.c', 1485876819);
insert into visits(email, timestamp) values('k@b.c', 1485876825);
insert into visits(email, timestamp) values('l@b.c', 1485876859);
insert into visits(email, timestamp) values('m@b.c', 1485876869);
insert into visits(email, timestamp) values('n@b.c', 1485877159);
insert into visits(email, timestamp) values('o@b.c', 1485877259);
insert into visits(email, timestamp) values('p@b.c', 1485877289);
insert into visits(email, timestamp) values('q@b.c', 1485877299);
insert into visits(email, timestamp) values('r@b.c', 1485877359);
insert into visits(email, timestamp) values('s@b.c', 1485877389);
insert into visits(email, timestamp) values('t@b.c', 1485877459);
insert into visits(email, timestamp) values('u@b.c', 1485877509);
insert into visits(email, timestamp) values('v@b.c', 1485877529);
