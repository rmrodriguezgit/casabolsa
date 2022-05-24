
create database casabolsa;
use casabolsa;

DROP TABLE IF EXISTS tb_venta_divisas;
CREATE TABLE tb_venta_divisas(
id_venta INT NOT NULL AUTO_INCREMENT,
ine VARCHAR(100),
abrev VARCHAR(3),
valor decimal(19,2),
cantidad int,
total decimal(19,2),
fecha_act DATE,
PRIMARY KEY (id_venta)
);

select *
from tb_venta_divisas;

DROP TABLE IF EXISTS tb_divisas;
CREATE TABLE tb_divisas(
id_div INT NOT NULL AUTO_INCREMENT,
abrev VARCHAR(3),
descripcion VARCHAR(100),
valor decimal(19,2),
reserva decimal(19,2),
fecha_act DATE,
PRIMARY KEY (id_div)
);

select * from tb_divisas;

DROP TABLE IF EXISTS clientes;
create table clientes(
id_cliente INT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(100),
apellidos VARCHAR(150),
email varchar(200),
rfc varchar(13),
ine VARCHAR(20),
activo int DEFAULT 1,
PRIMARY KEY (id_cliente)
);

select * from clientes;

INSERT INTO clientes (nombre, apellidos, email, rfc, ine) VALUES ('Ruben','Rodríguez','mirodrig@hotmail.com','RORR691029NE1', '100234512');
