<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
define('BASE_URL', str_replace('/index.php', '', $_SERVER['PHP_SELF']));

$conf = array();

// Título do site
$conf['title']              = 'Nome do site';

// Separador de títulos
$conf['title_separator']    = '/';

// TRUE para layout habilitado
$conf['layout']             = true;

// Navegação
$conf['navigation']         = array();
