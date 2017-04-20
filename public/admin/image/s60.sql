create database s60;

use s60;

create table student(
id int unsigned not null auto_increment primary key,
name varchar(255) not null,
age int(3) not null,
sex enum('0','1') not null default 1,
grade char(4) not null default 's54'
)engine=innodb;

INSERT INTO `student` (`id`, `name`, `age`, `sex`, `grade`) VALUES
(1, 'jack', 17, '0', 's60'),
(2, 'rose', 18, '1', 's60'),
(3, 'tom', 18, '0', 's60'),
(4, 'kate', 19, '1', 's60');


insert into student(name,age) select concat(name,id),age from student ;