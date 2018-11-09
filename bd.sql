CREATE DATABASE MaisCP2;

use MaisCP2;

CREATE TABLE usuario(
usuario_id int auto_increment not null,
nome varchar(30) not null,
senha varchar(12) not null,
matricula varchar(9) not null,
professor_id int,
aluno_id int,
email varchar(30) not null,
nomeUsuario varchar(30) not null,
PRIMARY KEY(usuario_id)
);

CREATE TABLE aluno(
aluno_id int not null,
PRIMARY KEY (aluno_id),
FOREIGN KEY(aluno_id) REFERENCES usuario(usuario_id)
);

CREATE TABLE professor(
professor_id int not null,
PRIMARY KEY (professor_id),
FOREIGN KEY (professor_id) REFERENCES usuario(usuario_id)
);

CREATE TABLE thread(
thread_id int auto_increment not null,
titulo varchar(30) not null,
disciplina int not null,
data date not null,
serie int not null,
descricao varchar(2048) not null,
usuario_id int not null,
PRIMARY KEY (thread_id),
FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);
CREATE TABLE postagem(
postagem_id int auto_increment not null,
data date not null,
resposta varchar(2048) not null,
usuario_id int not null,
thread_id int not null,
PRIMARY KEY (postagem_id),
FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id),
FOREIGN KEY (thread_id) REFERENCES thread(thread_id)
);

CREATE TABLE avalia_thread(
voto int not null,
usuario_id int not null,
thread_id int not null,
PRIMARY KEY (usuario_id, thread_id),
FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id),
FOREIGN KEY (thread_id) REFERENCES thread(thread_id)
);

CREATE TABLE avalia_postagem (
voto int not null,
usuario_id int not null,
postagem_id int not null,
PRIMARY KEY (usuario_id, postagem_id),
FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id),
FOREIGN KEY (postagem_id) REFERENCES postagem(postagem_id)
);
