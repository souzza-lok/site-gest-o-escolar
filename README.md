# site-gest-o-escolar

Sistema de gestão de aulas escolares com frontend estático e backend em PHP/SQLite.

## Arquitetura

* **HTML/JS** nas páginas raiz (`index.html`, `gestao.html`, etc.)
* **Banco de dados** SQLite em `data/aulas.sqlite`
* **APIs PHP** em raiz para CRUD de horários:
  * `db.php` – inicializa a conexão e cria a tabela `aulas` automaticamente
  * `listar_aulas.php` – retorna JSON com todas as aulas
  * `salvar_aula.php` – insere nova aula (envia via POST)
  * `editar_aula.php` – atualiza aula existente
  * `deletar_aula.php` – remove aula por id
  * `deletar_todas_aulas.php` – limpa a tabela

## Configuração

1. Instale um servidor PHP (apache, nginx, ou `php -S localhost:8000`).
2. Garanta que o PHP possa gravar em `data/` (o diretório é criado automaticamente).
3. Acesse `gestao.html` e o frontend comunicará o backend.

## Bugs corrigidos / melhorias

* estilização dark e navegação fixa sem sobreposição
* interatividade na barra de topo com hover e efeito scroll
* correções menores de CSS, formulários e filtros
* substituído `localStorage` por chamadas AJAX para o backend
* adição de padding no body para compensar header fixo
* correção do posicionamento do menu móvel e melhorias UI

## Desenvolvimento

- Scripts PHP usam PDO com tratamento de exceções.
- A ID de cada aula é gerada no frontend ou backend (`uniqid`).

Feel free to extend database, add autenticação, etc.
