CREATE DATABASE test30 ;

USE test30 ; 

CREATE TABLE articles IN test30 (
	id_article int primary key,
	nom_article varchar(50) not null,
	contenu_article varchar (255) not null
) ENGINE=InnoDB ;