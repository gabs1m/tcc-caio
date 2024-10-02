CREATE SCHEMA IF NOT EXISTS PeaceFun;
USE PeaceFun;

-- TABELA USUARIO
CREATE TABLE IF NOT EXISTS PeaceFun.Usuario(
   idUsuario INT NOT NULL AUTO_INCREMENT,
   Nome VARCHAR(45) NOT NULL,
   DataNascimento DATE,
   Cpf VARCHAR(11) NOT NULL,
   Genero VARCHAR(10) NOT NULL,
   Telefone VARCHAR(12) NOT NULL,
   Email VARCHAR(45) NOT NULL,
   Senha VARCHAR(20) NOT NULL,
   Imagem VARCHAR(100) NULL DEFAULT NULL,
   PRIMARY KEY (idUsuario)
);
INSERT INTO PeaceFun.Usuario SET Nome = 'Gabriel', DataNascimento = '2001-01-01', Cpf = '00000000000', Genero = 'Masculino', Telefone = '00000-0000', Email = 'gabriel@gmail.com', Senha = '12345', Imagem = '';

 -- TABELA ANFITRIAO
 CREATE TABLE IF NOT EXISTS PeaceFun.Anfitriao(
  idAnfitriao INT NOT NULL AUTO_INCREMENT,
  Nome VARCHAR(45) NOT NULL,
  DocumentoIdentidade VARCHAR(11) NOT NULL,
  Telefone VARCHAR(12) NOT NULL,
  Email VARCHAR (45) NOT NULL,
  Senha VARCHAR(20) NOT NULL,
  Imagem VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (idAnfitriao)
);
INSERT INTO PeaceFun.Anfitriao SET Nome = 'Caio', DocumentoIdentidade = '00000000000', Telefone = '00000-0000', Email = 'caio@gmail.com', Senha = '123', Imagem = '';

-- TABELA EVENTO
CREATE TABLE IF NOT EXISTS PeaceFun.Evento(
   idEvento INT NOT NULL AUTO_INCREMENT,
   idAnfitriao integer NOT NULL,
   Nome VARCHAR(100) NOT NULL,
   Categoria VARCHAR (11) NOT NULL,
   Descricao TEXT NOT NULL,
   Bairro VARCHAR(45) NOT NULL,
   LocalEvento VARCHAR (45) NOT NULL,
   Rua VARCHAR(45) NOT NULL, 
   DataEvento DATE NOT NULL,
   Imagem VARCHAR(100) NULL DEFAULT NULL,
   PRIMARY KEY (idEvento),
   FOREIGN KEY (idAnfitriao) REFERENCES Anfitriao(idAnfitriao)
);
INSERT INTO PeaceFun.Evento SET idAnfitriao = 1, Nome = 'Festa de Aniversário', Categoria = 'Cultura', Descricao = 'Festa de aniversário do Gabriel', Bairro = 'Centro', LocalEvento = 'Casa do Gabriel', Rua = 'Rua 1', DataEvento = '2021-01-01', Imagem = '';