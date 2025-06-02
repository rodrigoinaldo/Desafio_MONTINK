/* vai dropar a tabela se ela ja existir*/ 
/*Drop schema if exists prontuario_vet;*/
/*criando a tabela*/
Create schema testeTrabalho
/*usando a tabela*/
USE testeTrabalho;

/*criando a primeria tabela*/
Create Table Produtos
(
	id INTEGER primary key auto_increment,
    nome varchar(50),
    preco varchar(50)
    
);

Create Table Estoque 
(
	id INTEGER primary key auto_increment,
    produto_id integer,
    variacao TEXT,
	FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

