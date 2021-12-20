/* LOGICOOOOOOO: */
DROP TABLE IF EXISTS
	Aloca,
	Vaga,
	Pessoa,
	Endereco,
	estacionamento,
	empresa;

CREATE TABLE ESTACIONAMENTO (
    idEstac SERIAL PRIMARY KEY,
    nomEstac varchar(45),
    qtdVagas int,
    valFixo double precision,
    valAcresc double precision,
    idEmpresa int
);

CREATE TABLE ENDERECO (
    idEnd SERIAL PRIMARY KEY,
    dscLogradouro varchar(45),
    numero int,
    cep varchar(20),
    idEstac int
);

CREATE TABLE EMPRESA (
    idEmpresa SERIAL PRIMARY KEY,
    nomEmpresa varchar(45),
    dscCpfCnpj varchar(45),
    Email varchar(45),
    Senha varchar(45),
    Telefone char(20),
    UNIQUE (dscCpfCnpj, Email, Telefone)
);

CREATE TABLE VAGA (
    codVaga SERIAL PRIMARY KEY,
    condVaga bool,
    idEstac int
);

CREATE TABLE PESSOA (
    idPessoa SERIAL PRIMARY KEY,
    nomPessoa varchar(45),
    datNasc date,
    sexPessoa char(3),
    cpfPessoa varchar(45) UNIQUE
);

CREATE TABLE Aloca (
    idPessoa int,
    codVaga int,
    hrEntrada timestamp,
    hrSaida timestamp,
    valTotal double precision,
    dscPlaca varchar(45)
);
 
ALTER TABLE ESTACIONAMENTO ADD CONSTRAINT FK_ESTACIONAMENTO_2
    FOREIGN KEY (idEmpresa)
    REFERENCES EMPRESA (idEmpresa)
    ON DELETE RESTRICT;
 
ALTER TABLE ENDERECO ADD CONSTRAINT FK_ENDERECO_2
    FOREIGN KEY (idEstac)
    REFERENCES ESTACIONAMENTO (idEstac)
    ON DELETE RESTRICT;
 
ALTER TABLE VAGA ADD CONSTRAINT FK_VAGA_2
    FOREIGN KEY (idEstac)
    REFERENCES ESTACIONAMENTO (idEstac)
    ON DELETE RESTRICT;
 
ALTER TABLE Aloca ADD CONSTRAINT FK_Aloca_1
    FOREIGN KEY (idPessoa)
    REFERENCES PESSOA (idPessoa)
    ON DELETE SET NULL;
 
ALTER TABLE Aloca ADD CONSTRAINT FK_Aloca_2
    FOREIGN KEY (codVaga)
    REFERENCES VAGA (codVaga)
    ON DELETE SET NULL;