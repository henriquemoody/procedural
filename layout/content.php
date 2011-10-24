<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}

/**
 * Este arquivo verifica a página e subpágina, inclui o arquivo e
 * armazena seu conteúdo na variável $content
 */
ob_start();
include_once $filename;
$content = ob_get_contents();
ob_clean();