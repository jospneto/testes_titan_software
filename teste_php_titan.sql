create database titan_test_php;

use titan_test_php;

create table produtos(
	idprod int(11),
    nome varchar(40),
    cor varchar(20),
    primary key(idprod)
);

create table precos(
	idpreco int(11),
    preco decimal(15, 2),
    primary key(idpreco),
    constraint fk_preco_prod foreign key(idpreco) references produtos(idprod)
);