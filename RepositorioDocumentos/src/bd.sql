msyql -u root -p;

/* Se crea y se ingresa  la base de datos */
CREATE DATABASE repbd;
USE repbd;

/*Se crea la tabla para los usuarios*/
CREATE TABLE usuario (
    usuid int(15) auto_increment primary key,
    usunombre varchar(30) not null,
    usucontraseña varchar(30) not null
);

/*Se crea la tabla donde se alojara los documentos y sus propiedades*/
CREATE TABLE documentos (
    docid int(15) auto_increment primary key,
    docnombre varchar(30) not null,
    docdescripcion varchar(30) not null,
    docfecha date not null,
    doctamano varchar(30),
    doctipo varchar(30) not null
);

