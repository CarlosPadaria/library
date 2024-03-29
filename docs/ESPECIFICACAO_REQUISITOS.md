# Especificação de Requisitos
## Glossário
* **Administrador:** A pessoa que opera o sistema;
* **Livros:** Refere-se a entidade Livro;
* **Usuários:** Refere-se a entidade Usuário;
* **Empréstimo:** Refere-se a entidade empréstimo.

## Requisitos funcionais.

### RF1
O Administrador deve ser capaz de cadastrar, listar, atualizar e deletar livros.

### RF2
O Administrador deve ser capaz de procurar os livros por título, ISBN ou autor.

### RF3
O Administrador deve ser capaz de cadastrar, listar, atualizar e deletar Usuários.

### RF4
O Administrador deve ser capaz de visualizar o histórico de empréstimos de um Usuário.

### RF5
O Administrador deve ser capaz de pesquisar Usuários pelo código ou nome.

### RF6
O Administrador deve ser capaz de cadastrar empréstimos fornecendo o código de Usuário ou ISBN do Livro.

### RF7
O Administrador podera pesquisar empréstimos por ISBN, nome do livro, nome do usuário ou código do Usuário

### RF8
O Administrador deve ser capaz de listar e deletar empréstimos.

### RF9
O Administrador deve ser capaz de retornar os Livros que foram emprestados.

## Requisitos Não Funcionais
### RNF1
A aplicação deve estar responsiva em todos os dispositivos

## Regras de Negócio
### RN1
O Administrador não pode cadastrar o Empréstimo de um Livro que não foi retornado.

### RN2
Um Usuário pode ter no máximo três empréstimos ativos ao mesmo tempo.

### RN3
Usuários não são necessariamente deletados. Em vez disso, o seu status é alterado para "I"(inativo).

### RN4
Usuários inativos não aparecem mais na lista de usuarios, mas podem aparecer na lista de empréstimos.
  
### RN5
Livros não sao necessariamente deletados. Em vez disso, o seus status é alterado para "I"(inativo)

### RN6
Livros inativos não aparecem mais na lista de livros, mas podem aparecer na lista de empréstimos.

