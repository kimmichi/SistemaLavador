CREATE DATABASE sistemalavador;
USE sistemalavador;

CREATE TABLE usuario(
id_usuario INT NOT NULL AUTO_INCREMENT,
permissao INT NOT NULL,
nome VARCHAR(50) NOT NULL,
usuario VARCHAR(30) NOT NULL,
senha VARCHAR(150) NOT NULL,
PRIMARY KEY (id_usuario)
);

INSERT INTO usuario (id_usuario, permissao, nome, usuario, senha) VALUES (NULL, 2, "Sirlaine", "Sirlaine", "SENHA");
INSERT INTO usuario (id_usuario, permissao, nome, usuario, senha) VALUES (NULL, 2, "nome_usuario", "teste", "teste");



CREATE TABLE pagamento(
id_pagamento INT NOT NULL AUTO_INCREMENT,
tipo_pagamento INT NOT NULL,
pagamento VARCHAR(50) NOT NULL,
PRIMARY KEY (id_pagamento)
);

INSERT INTO pagamento (id_pagamento, tipo_pagamento, pagamento) VALUE (NULL,1, "PRAZO"),
(NULL,2, "RESGATE"),
(NULL,3, "CARTAO CREDITO"),
(NULL,4, "CARTAO DEBITO"),
(NULL,5, "DINHEIRO"),
(NULL,6, "PIX");

CREATE TABLE veiculo(
id_veiculo INT NOT NULL AUTO_INCREMENT,
tipo_veiculo INT NOT NULL,
veiculo VARCHAR(50) NOT NULL,
PRIMARY KEY (id_veiculo)
);
INSERT INTO veiculo (id_veiculo, tipo_veiculo, veiculo) VALUE 
(NULL, 1,"MOTO"),
(NULL, 2,"CARRO"),
(NULL, 3,"CAMINHONETE"),
(NULL, 1,"OUTROS");

CREATE TABLE lavada (
id_lavada INT NOT NULL AUTO_INCREMENT,
tipo_lavada INT NOT NULL,
lavada VARCHAR(100) NOT NULL,
PRIMARY KEY (id_lavada)
);
INSERT INTO lavada (id_lavada, tipo_lavada, lavada) VALUES 
(NULL, 1, "COMPLETO COM CERA"),
(NULL, 2, "COMPLETO SEM CERA"),
(NULL, 3, "SOMENTE EXTERNA"),
(NULL, 4, "SOMENTE INTERNA");

CREATE TABLE tabela_preco_lavada(
id_preco INT NOT NULL AUTO_INCREMENT,
idlavada INT NOT NULL,
idveiculo INT NOT NULL,
preco DECIMAL(5,2) NOT NULL,
FOREIGN KEY (idlavada) REFERENCES lavada (id_lavada),
FOREIGN KEY (idveiculo) REFERENCES veiculo (id_veiculo),
PRIMARY KEY (id_preco, idlavada, idveiculo)
);
INSERT INTO tabela_preco_lavada (id_preco, idlavada, idveiculo, preco) VALUES 
(NULL,1,1,30.00), -- COMPLETA COM CERA MOTO
(NULL,2,1,25.00), -- COMPLETA SEM CERA MOTO
(NULL,1,2,60.00), -- COMPLETA COM CERA CARRO
(NULL,2,2,50.00), -- COMPLETA SEM CERA CARRO
(NULL,1,3,80.00), -- COMPLETA COM CERA CAMINHONETE
(NULL,2,3,70.00), -- COMPLETA SEM CERA CAMINHONETE
(NULL,3,2,40.00), -- SOMENTE EXETERNA CARRO
(NULL,4,2,40.00), -- SOMENTE INTERNA CARRO
(NULL,3,3,70.00), -- SOMENTE EXTERNA CAMINHONETE
(NULL,4,3,40.00); -- SOMENTE INTERNA CAMINHONETE

CREATE TABLE venda_lavada(
id_venda_lavada INT NOT NULL AUTO_INCREMENT,
dt_venda timestamp,
situacao INT NOT NULL,
ficha INT NOT NULL,
placa VARCHAR(15) NOT NULL,
empresa varchar(60) NOT NULL,
valor DECIMAL(5,2) NOT NULL,
num_nota varchar(20),
descricao VARCHAR(50),
idusuario INT NOT NULL,
idpagamento INT NOT NULL,
idpreco INT NOT NULL,
FOREIGN KEY (idusuario) REFERENCES usuario (id_usuario),
FOREIGN KEY (idpagamento) REFERENCES pagamento (id_pagamento),
FOREIGN KEY (idpreco) REFERENCES tabela_preco_lavada (id_preco),
PRIMARY KEY (id_venda_lavada, idusuario, idpagamento, idpreco)
);
INSERT INTO venda_lavada (id_venda_lavada, situacao, ficha, placa, empresa, valor, num_nota,descricao, dt_venda, idusuario, idpagamento, idpreco)
VALUES (NULL,1,1, "ABC-8132", "FERNANDES AMADEU", 15.00,"283172",NULL,NULL,1,5,1);

SELECT nome, usuario, senha FROM usuario;
SELECT id_usuario, usuario, senha FROM usuario 
where usuario = "Sirlaine" and senha = "SENHA";
-- ficha, placa, empresa, valor, num_nota, descricao, nome, pagamento,preco
SELECT id_venda_lavada, ficha, placa, empresa, valor, num_nota, descricao, nome, pagamento,preco FROM venda_lavada
inner join usuario on usuario.id_usuario = venda_lavada.idusuario
inner join pagamento on pagamento.id_pagamento = venda_lavada.idpagamento
inner join tabela_preco_lavada on tabela_preco_lavada.id_preco =  venda_lavada.idpreco;

SELECT ficha, placa, veiculo, lavada, empresa, nome, pagamento, valor, num_nota FROM venda_lavada
inner join usuario on usuario.id_usuario = venda_lavada.idusuario
inner join pagamento on pagamento.id_pagamento = venda_lavada.idpagamento
inner join tabela_preco_lavada on tabela_preco_lavada.id_preco =  venda_lavada.idpreco
inner join lavada on lavada.id_lavada = tabela_preco_lavada.idlavada
inner join veiculo on veiculo.id_veiculo = tabela_preco_lavada.idveiculo where situacao = 0 order by(id_venda_lavada);

select * from usuario where nome LIKE "%Sir%";
SELECT * from venda_lavada;

show tables;
select * from venda_lavada	 ;
select * from pagamento ;
select * from usuario ;
select * from tabela_preco_lavada ;
select ficha from venda_lavada order by id_venda_lavada desc limit 1;
-- select max(ficha) from venda_lavada order by id_venda_lavada desc limit 13;
update venda_lavada set situacao = 0 where id_venda_lavada = 2;
delete From venda_lavada where situacao = 1;
update venda_lavada set situacao = 1 where id_venda_lavada = 2;

UPDATE venda_lavada SET 
ficha = 2, placa = 'deu certo', 
empresa = 'teckwiser', valor=100.00, 
num_nota = '00000', descricao = 'esse teste deu certo', 
idpagamento = '1'
WHERE id_venda_lavada = 3;

UPDATE venda_lavada SET 
            ficha = 2, placa = 'deu certo', 
            empresa = 'teckwiser', valor=100.00, 
            num_nota = '00000', descricao = 'esse teste deu certo', 
            idpagamento = '1'
            WHERE id_venda_lavada = 4;
-- delete from veiculo where  id_veiculo = 4;
-- DROP DATABASE sistemalavador;