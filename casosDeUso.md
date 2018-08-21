# Especificação de Casos de Uso

# Sumário

- [CDU 01 - Solicitar Cadastro](#cd01---solicitar-cadastro)
- [CDU 02 - Autenticar](#cd02---autenticar)
- [CDU 03 - Alterando Dados](#cdu-03---alterando-dados)
- [CDU 04 - Visualizar Atividade](#cdu-04---visualizar-atividade)
- [CDU 05 - Pesquisar Thread](#cdu-05---pesquisar-thread)
- [CDU 06 - Manter Thread](#cdu-06---manter-thread)
- [CDU 07 - Gerenciar Thread](#cdu-07---gerenciar-thread)
- [CDU 08 - Gerenciar Usuário](#cdu-08---gerenciar-usuário)

# CD01 - Solicitar Cadastro
**Atores:** Aluno e professor

**Pré-condições:** Ser aluno ou professor do Colégio Pedro II.

**Fluxo principal:**
1. O usuário especifica a sua classificação entre Professor e Aluno.
2. O sistema transfere o usuário para uma tela de cadastro através da informação.
3. O Usuário informa os dados a partir do que é requerido no formulário.
4. O sistema verifica se as informações são válidas.
5. O usuário é cadastrado caso todas as informações sejam validadas.

# CD02 - Autenticar
**Atores:** Aluno e Professor

**Pré-condições:** Possuir cadastro

**Fluxo principal:**
1. O usuário informa seu username e sua senha.
2. O sistema verifica as informações fornecidas e caso as mesmas sejam válidas, o usuário consegue o acesso.

# CD03 - Alterando Dados

**Atores:** Professor e Aluno

**Pré-condições:**  O usuário deverá ter realizado o login.


**Fluxo principal:**
1.  O usuário acessa seu perfil e escolhe a opção de alterar dados.
2. O sistema transfere o usuário para o formulário de alterações.
3. O usuário edita os campos que deseja alterar.
4. O sistema verifica novamente a senha do usuário para permitir uma alteração segura.

# CD04 - Visualizar Atividade

**Atores:** Professor, aluno e observador

**Pré-condições:** Não há condições.

**Fluxo principal:**
1. O usuário acessa o perfil desejado para visualizar as atividades.
2. O usuário seleciona quais atividades quer visualizar.
3. O sistema exibe as atividades realizadas.


# CD05 - Pesquisar Thread
**Atores: Aluno, Professor e Observador**

**Pré-condições: Não há**

**Fluxo principal:**
1. O usuário utiliza a função 'pesquisa' e faz uma busca.
   - A busca poderá ser feita através do título da thread ou do nome de usuário do autor.
2. O sistema exibe os resultados da busca ordenados do mais recente para o mais antigo, podendo alterar os critérios dessa ordem.

# CD06 - Manter Threads
**Atores: Aluno e Professor**

**Pré-condições: Estar cadastrado no site.**

**Fluxo principal:**
1. O usuário pode criar uma nova thread, especificando a matéria e a série da dúvida.
2. Caso haja uma alteração na dúvida dentro da mesma thread, o usuário poderá editá-la para adequar-se aos novos parâmetros.
  - O título e a descrição da thread poderão ser alteradas, mas a matéria e a série não.
  - Caso a thread tenha sido concluída o usuário poderá fechá-la. Ou seja, encerrar o envio de novas respostas.
3. Outros usuários do site poderão enviar respostas a thread.
  - Podendo avaliar as melhores respostas.

# CD07 - Gerenciar Thread
**Atores: Professor**

**Pré-condições: Ser um usuário Professor**

**Fluxo principal:**
1. Caso haja um linguajar ofensivo ou inapropriado o Professor poderá excluir o comentário ou a thread.
  - Também poderá fechar a thread caso o usuário Aluno não o faça.


# CD08 - Gerenciar Usuário
**Atores: Professor**

**Pré-condições: Ser um usuário Professor**

**Fluxo principal:**
1. O usuário Professor poderá ver os dados de todos os usuários, afim de checar as informações.
2. Poderá banir a conta de algum usuário caso o mesmo ofender alguém.
