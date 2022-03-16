CREATE TABLE medico(
   id serial,
   nome varchar(50),
   telefone varchar(50),
   especialidade varchar(50),

   /*Restrições*/
   primary key (id)
) ENGINE=InnoDB;