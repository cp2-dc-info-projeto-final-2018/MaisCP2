use MaisCP2;

CREATE TABLE aluno(
aluno_id int identity not null,
serie int not null,
curso int not null,
PRIMARY KEY (aluno_id),
FOREIGN KEY(aluno_id) REFERENCES usuario(usuario_id)
);

CREATE TABLE professor(
professor_id int identity not null,
disciplina int not null,
PRIMARY KEY (professor_id),
FOREIGN KEY (professor_id) REFERENCES usuario(usuario_id)
);

CREATE TABLE usuario(
usuario_id int identity not null,
nome varchar(30) not null,
dataNasc date not null,
matricula varchar(9) not null,
professor_id int,
aluno_id int,
PRIMARY KEY(usuario_id)
);

CREATE TABLE thread(
thread_id int identity not null,
titulo varchar(30) not null,
disciplina int not null,
data date not null,
serie int not null,
descricao varchar not null,
usuario_id int not null,
PRIMARY KEY (thread_id),
FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);
CREATE TABLE postagem(
postagem_id int identity not null,
data date not null,
resposta varchar not null,
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
