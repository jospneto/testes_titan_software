create database teste_sql_titansoftware;

use teste_sql_titansoftware;

create table produtos(
	cod_prod int(8),
    loj_prod int(8),
    desc_prod varchar(40),
    dt_inclu_prod date,
    preco_prod decimal(8,3),
    primary key(cod_prod),
    constraint fk_loj_prod foreign key(loj_prod) references lojas(loj_prod)
    
);

create table lojas(
	loj_prod int(8),
    desc_loja varchar(40),
    primary key(loj_prod)
);

create table estoque(
	cod_prod int(8),
    loj_prod int(8),
    qtd_prod decimal(15,3),
    primary key(cod_prod),
    constraint fk_cod_prod foreign key(cod_prod) references produtos(cod_prod),
    constraint fk_loj_prod_estoque foreign key(loj_prod) references lojas(loj_prod)
);

insert into produtos values(
	170, 2, 'LEITE CONDENSADO MOCOCA', '2010-10-30', 45.40
);

insert into produtos values(
	110, 1, 'ARROZ PARBORIZADO', '2010-10-15', 50
);

insert into lojas values(
	2, 'LOJA NÚMERO 2'
);

insert into lojas values(
	1, 'LOJA NÚMERO 1'
);

update produtos set preco_prod = 95.40 where cod_prod = 170 and loj_prod = 2;

select * from (select * from produtos where loj_prod = 1 or loj_prod = 2) lojas;

select max(dt_inclu_prod) as 'maior_data', min(dt_inclu_prod) as 'menor_data' from produtos;

select count(cod_prod) as 'quantidade_registros' from produtos;

select * from produtos where desc_prod like 'L%';

select sum(preco_prod) as 'soma_precos_produtos_total' from produtos;

select sum(preco_prod) as 'soma_precos' from produtos left outer join lojas on 'soma_precos' > 100 order by lojas.loj_prod;

select lojas.loj_prod, lojas.desc_loja, produtos.cod_prod, produtos.desc_prod, produtos.preco_prod, count(produtos.cod_prod) as 'quantidade_produtos'
from produtos, lojas where lojas.loj_prod = 1;

select * from produtos left outer join estoque on produtos.cod_prod != estoque.cod_prod;

select * from estoque left outer join produtos on estoque.cod_prod != produtos.cod_prod;
