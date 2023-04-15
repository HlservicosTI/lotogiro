Essa implementação é a original e não contém nenhum arquivo 
que foi modificado durante o bichão

## Arquivos que foram modificados do Bichão.

- routes/web:
    - Foram adicionados os caminhos das telas do bichão
-  __SQL__:
  - Uma pasta nova contendo todos os scripts sql tanto de tabelas novas criadas como de alterações em outras tabelas já existentes
  
- app/Http/Controllers/Admin/Bets/BichaoController.php
  -  Foram adicionados os métodos para retornar as views de cada modalidade criada na página do bichão obs: ( a rota index é a rota principal, no caso a tela de milhar que é a tela principal do bichão está nela.)
- app/Models/Animals.php
  - A model Animals foi criada para ter acesso aos animais para a tela de resultados
  - A model Cotacao foi criada para ter acesso as cotações das modalidades, tanto o nome quanto o valor.
- resources/views/admin/layouts/sidebar.php 
  - Foi inserido manualmente um elemento no menu que será redirecionado para a tela principal do bichão.
- resources/views/admin/layouts/menu-bichao-buttons.blade.php
  - Foi adicionado o menu das telas do bichão para inserir como padrão ao invés de chamar toda vez em cada view, não foi implementado
- resources/views/admin/pages/bets/game/bichao
  - Contém todas as telas criadas para o bichão
