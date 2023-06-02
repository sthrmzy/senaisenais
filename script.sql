create database escola;

use escola;

create table monitoramento(id int(100) not null auto_increment, nome varchar(100) not null, sobrenome varchar(300) not null, telefone varchar(14) not null, turma varchar(10) not null, data_deteccao date not null, sintomas boolean not null, primary key (id));

select id, nome, sobrenome, telefone, turma, data_deteccao,
  CASE
    WHEN sintomas = 1 THEN 'Sim'
    WHEN sintomas = 0 THEN 'Não'
    ELSE 'Desconhecido'
  END AS sintomas
FROM monitoramento;
