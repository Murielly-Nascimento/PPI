CREATE TABLE endereco_trab7(
   id serial,
   cep char(10) not null,
   rua varchar(100),
   bairro varchar(50),
   cidade varchar(50),

   /*Restrições*/
   primary key (id)
) ENGINE=InnoDB;