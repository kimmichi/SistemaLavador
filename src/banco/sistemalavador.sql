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
(NULL, 3,"CAMINHOTE"),
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
ficha INT NOT NULL,
placa VARCHAR(15) NOT NULL,
empresa varchar(60) NOT NULL,
pessoa_desconto VARCHAR(50),
valor DECIMAL(5,2) NOT NULL,
idusuario INT NOT NULL,
idpagamento INT NOT NULL,
idpreco INT NOT NULL,
FOREIGN KEY (idusuario) REFERENCES usuario (id_usuario),
FOREIGN KEY (idpagamento) REFERENCES pagamento (id_pagamento),
FOREIGN KEY (idpreco) REFERENCES tabela_preco_lavada (id_preco),
PRIMARY KEY (id_venda_lavada, idusuario, idpagamento, idpreco)
);
INSERT INTO venda_lavada (id_venda_lavada, ficha, placa, empresa, pessoa_desconto, valor, idusuario, idpagamento, idpreco)
VALUES (NULL,10, "ABC-8132", "FERNANDES AMADEU",NULL, 15.00,1,5,1);





show tables;
select * from venda_lavada ;
select * from pagamento ;
-- delete from veiculo where  id_veiculo = 4;
-- DROP DATABASE sistemalavador;