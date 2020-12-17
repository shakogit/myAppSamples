show datebases;

create database db_name;

use db_name;

drop database db_name;

grant all privileges on db_name.*  to 'username'@'localhost' identified by 'password';

show grants for 'username' @ 'localhost';



create table name (

id int (11) not null auto_increment,
name1 varchar(255),
name2 int (3),
name3 tinyint (1),
primary key (id)
);

show tables;

show columns from table_name;

drop table table_name;



select * from table where column1 = 'some text here';
insert into table (col1, col2, col3) values (val1, val2, val3);
update name set col1 = 'this', col2 = 'that' where id = 1;
delete from table where id = 1;


alter table table-name add index index-name (col);
