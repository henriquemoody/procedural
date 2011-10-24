# Manual

Neste modelo de site existem as seguintes pastas:

## Diretórios

### core/
Não é recomendado que você altere os arquivos desta pasta, pois isso pode afetar o funcionamento do site.

### functions/
Arquivos com funções para você usar no seu site. Cada arquivo deve conter apenas uma função.

### layout/
Você pode alterar o conteúdo destes arquivos, porém saiba que alterações nos arquivos desta pasta pode alterar o funcionamento do layout do site.

### modules/
Pastas com módulos do site.

## Arquivo core/settings.php

Este arquivo contém as configurações gerais para o site inteiro. Basicamente á uma variável do tipo array chamada $conf que contém dados referentes as configurações.
Você pode adicionar quaisquer chaves que quiser na variável $conf, mas existem algumas chaves reservadas.

## Chaves reservadas do array $conf

### `$conf['title']`
Contém o título padrão do site.
### `$conf['title_separator']`
Contém o separador para os títulos, pois por padrão o título do layout é o título padrão, seguido do título da página, seguido do título subpágina.
### `$conf['layout']`
Se for igual à TRUE permite layouts (templates), se for FALSE não permite.
### `$conf['navigation']`
Array multidimensional que pode conter o conteúdo da navegação do site.
Exemplo de navegação

	$conf['navigation'] = array(
	    array(
	        'title'  => 'Início',
	        'page'   => 'index',
	        'module' => 'default' //Se não existir "module" define "default" por padrão
	    ),
	    array(
	        'title'  => 'Produtos',
	        'page'   => 'produtos',
	        'module' => 'default',
	        'pages'  => array( //Subpáginas
	            array(
	                'title' => 'Eletrônicos',
	                'page'  => 'eletronicos'
	            ),
	            array(
	                'title' => 'Moveis',
	                'page'  => 'moveis'
	            )
	        ),
	    ),
	    array(
	        'title' => 'Contato',
	        'page'  => 'contato',
	        'module' => 'default'
	    )
	);

## Módulos

Módulos podem ser interpretados como "setores" do site. Por, exemplo, geralmente, em um mesmo domínio, http://www.exemplo.com.br/ existem as páginas principais, que, geralmente, todos podem acessar, e as páginas de painel administrativo, uma área restrita para clientes, etc.

Neste modelo de site, as páginas principais são as páginas do módulo "default" e são acessadas da seguinte forma, por exemplo:

> http://www.exemplo.com.br/pagina
> http://www.exemplo.com.br/subpagina
> http://www.exemplo.com.br/pagina?parametro=valor

Você pode criar quantos módulos desejar e eles serão acessados da seguinte forma, por exemplo:

> http://www.exemplo.com.br/modulo/pagina
> http://www.exemplo.com.br/modulo/subpagina
> http://www.exemplo.com.br/modulo/pagina?parametro=valor

Portanto, se você cria um módulo de nome admin, você acessará as páginas dele a partir da url http://www.exemplo.com.br/admin

### Criando um módulo

Para criar um módulo você deve seguir a seguinte estrutura de arquivos.

#### modules/modulo
Criar uma pasta na pasta "modules" com o nome do módulo desejado.
#### modules/admin/pages/
Criar uma pasta chamada "pages" dentro da pasta com o nome do módulo. Nesta pasta é que estarão as páginas do módulo.
#### modules/admin/pages/index.php
Página inicial do módulo, que aparece quando o módulo é acessado diretamente.
#### modules/admin/settings.php
Arquivo com configurações específicas para o módulo. 
Você pode por exemplo sobreescrever valores do array $conf, sendo assim você pode criar uma navegação diferente para cada módulo, fazer com que um módulo não possua layout (template), etc. 
Este arquivo é executado antes de qualquer página do módulo, portanto você pode
#### modules/admin/template.php
Arquivo com o layout da módulo.


Então, se você quiser criar um módulo chamado clientes, deve criar os seguintes arquivos e pastas:

> modules/clientes
> modules/clientes/pages
> modules/clientes/pages/index.php
> modules/clientes/settings.php
> modules/clientes/template.php

### Arquivos de layout

Para criar os layout dos módulos, você pode usar algumas variáveis específicas.

#### `$title`
Conteúdo do título da página, que é o título do site, seguido do título da página, seguido do título da subpágina.
#### `$navigation`
Contém a navegação formatada, baseada no array $conf['navigation']. Esta navegação é formatada em forma de lista com links, e possui algumas classes (CSS) para manipulação de estilos na navegação, tal como a página atual.
#### `$breadcrumbs`
Contém breadcrumbs formatados, baseada no array $conf['navigation'] e na página atual.
#### `$content`
Conteúdo da página atual.

### Páginas de erro

Existe um módulo padrão para erros modules/error que permite que você personalise suas mensagens de erro como quiser

## Fluxo do modelo do site

Para explicar como funciona o modelos, vamos dar um exemplo.
Ao requisitar a página http://www.exemplo.com.br/admin/postagem/cadastrar

1. Verifica se módulo, página e sub-página existem
2. Lê o conteúdo do arquivo `core/settings.php`
3. Lê o conteúdo do arquivo `modules/admin/settings.php`
4. Defines as variáveis de layout.
5. Lê o conteúdo do arquivo `modules/admin/pages/postagem_cadastrar.php` e guarda seu conteúdo na variável `$content`, sendo possível o envio de headers dentro deste arquivo.
6. Lê o conteúdo do arquivo `modules/admin/template.php` se existir, e se `$conf['layout']` for igual a `TRUE`.
7. Guarda todo o conteúdo renderizado na variável `$page`