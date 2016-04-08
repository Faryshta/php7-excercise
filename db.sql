create database php7_excercise;

create table php7_excercise.fibonacci (
    id int(11) unsigned not null primary key AUTO_INCREMENT,
    number int(11) unsigned not null
);

insert into php7_excercise.fibonacci (number) values (0),(1);
