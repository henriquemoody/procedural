<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
?>
<h2>Erro na aplicação</h2>
<?php
if (isset($message)) {
    echo $message;
}