CREATE DATABASE db_site;

USE db_site;

drop TABLE tbl_produto;
 
 
CREATE TABLE tbl_produto(codigo INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
						nome VARCHAR(100), 
						imagem VARCHAR(100),
						descricao VARCHAR(100), 
						preco DECIMAL(6,2), 
						valor_desconto DECIMAL(6,2), 
						status CHAR(1));

SELECT * FROM tbl_produto ORDER BY codigo DESC;

CREATE TABLE tbl_contato(codigo INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
						nome VARCHAR(100) NOT NULL, 
						telefone VARCHAR(100),
						celular VARCHAR(100) NOT NULL, 
						email VARCHAR(100) NOT NULL, 
						home_page VARCHAR(100), 
						facebook VARCHAR(100), 
						sugestoes TEXT, 
						produto VARCHAR(100), 
						sexo CHAR(1) NOT NULL, 
						profissao VARCHAR(100));
                        
SELECT * FROM tbl_contato ORDER BY codigo DESC;

DESC tbl_contato;