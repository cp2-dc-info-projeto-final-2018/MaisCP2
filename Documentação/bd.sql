CREATE TABLE disciplina (
  disciplina_id int(11) NOT NULL,
  nome varchar(100) NOT NULL,
  PRIMARY KEY (disciplina_id)
);

INSERT INTO disciplina (disciplina_id, nome) VALUES
(1, 'Português'),
(2, 'Geografia'),
(3, 'História'),
(4, 'Filosofia e Sociologia'),
(5, ' Linguas Estrangeiras'),
(6, 'Física'),
(7, ' Química'),
(8, 'Biologia'),
(9, 'Educação Física'),
(10, 'Desenho'),
(11, 'Informática'),
(12, 'Matemática');

CREATE TABLE postagem (
  postagem_id int(11) NOT NULL AUTO_INCREMENT,
  resposta varchar(2048) NOT NULL,
  usuario_id int(11) NOT NULL,
  thread_id int(11) NOT NULL,
  PRIMARY KEY (postagem_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id),
  FOREIGN KEY (thread_id) REFERENCES thread(thread_id)
);

CREATE TABLE thread (
  thread_id int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(100) NOT NULL,
  descricao varchar(2048) NOT NULL,
  usuario_id int(11) NOT NULL,
  disciplina int(100) NOT NULL,
  PRIMARY KEY (thread_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id),
  FOREIGN KEY (disciplina) REFERENCES disciplina(disciplina_id)
);


CREATE TABLE usuario (
  usuario_id int(11) NOT NULL AUTO_INCREMENT,
  nomeCompleto varchar(60) NOT NULL,
  nomeUsuario varchar(30) NOT NULL,
  senha varchar(60) NOT NULL,
  email varchar(60) NOT NULL,
  PRIMARY KEY (usuario_id)
) ;
