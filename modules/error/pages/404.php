<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
// Alterado o status da página para 404
header("HTTP/1.0 404 Not Found");
?>
<h2>Página não encontrada</h2>