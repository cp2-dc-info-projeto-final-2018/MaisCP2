# Especificação de Casos de Uso

# Sumário

- [CDU 01 - Cadastrar](#cd01---cadastrar)
- [CDU 02 - Autenticar](#cd02---autenticar)
- [CDU 03 - Visualizar Atividade](#cd03---visualizar-atividade)
- [CDU 04 - Pesquisar Thread](#cd04---pesquisar-thread)
- [CDU 05 - Manter Threads](#cd05---manter-threads)
- [CDU 06 - Manter Postagens](#cd06---manter-postagens)



# CD01 - Cadastrar
**Atores:** Qualquer um

**Pré-condições:** Nenhuma

**Fluxo principal:**
1. O sistema transfere o usuário para uma tela de cadastro através da de um link na tela inicial.
2. O Usuário informa os dados (nome, nome de usuário, senha e e-mail).
3. O usuário é cadastrado.

# CD02 - Autenticar
**Atores:** Usuário

**Pré-condições:** Possuir cadastro

**Fluxo principal:**
1. O usuário informa seu nome de usuário e sua senha.
2. O sistema verifica as informações fornecidas e caso as mesmas sejam válidas, o usuário consegue o acesso.

# CD03 - Visualizar Atividade

**Atores:** Usuário e Visitante

**Pré-condições:** Não há condições.

**Fluxo principal:**
1. O usuário acessa o perfil desejado para visualizar as threads que o usuário fez.
2. O sistema exibe as atividades realizadas.


# CD04 - Pesquisar Thread
**Atores:** Usuário e Visitante

**Pré-condições:** Não há

**Fluxo principal:**
1. O usuário utiliza a função 'pesquisa' e faz uma busca.
   - A busca poderá ser feita através de uma palavra presente no título da thread.
2. O sistema exibe os resultados da busca.

# CD05 - Manter Threads
**Atores:** Usuário

**Pré-condições:** Estar cadastrado no site

**Fluxo principal:**
1. O usuário pode criar uma nova thread, especificando a matéria.
2. Caso haja uma alteração na dúvida dentro da mesma thread, o usuário poderá editá-la para adequar-se aos novos parâmetros.
  - O título e a descrição da thread poderão ser alteradas, mas a matéria não.
3. O usuário pode remover as threads de sua autoria.


# CD06 - Manter Postagens
**Atores:** Usuário

**Pré-condições:** Estar cadastrado no site

**Fluxo principal:**
1. O usuário pode responder a uma thread.  
2. O usuário pode excluir as respostas que ele deu.   
