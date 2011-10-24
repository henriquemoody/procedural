<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
require_once(BASE_PATH . '/core/settings.php');
require_once(BASE_PATH . '/core/dispatch.php');

$page = '';
if ($conf['layout'] === true) {
    $template   = '';

    if (!file_exists(BASE_PATH . "/modules/{$module}/template.php")) {

        $filename   = "modules/error/pages/500.php";
        $message    = "Não há leyout especificado para o módulo \"{$module}\"";
        require_once(BASE_PATH . '/layout/content.php');
        $page       = $content;

    } else {

        require_once(BASE_PATH . '/layout/title.php');
        require_once(BASE_PATH . '/layout/navigation.php');
        require_once(BASE_PATH . '/layout/breadcrumbs.php');
        require_once(BASE_PATH . '/layout/content.php');
        ob_start();
        require_once(BASE_PATH . "/modules/{$module}/template.php");
        $page = ob_get_contents();
        ob_clean();

    }

} else {
    require_once(BASE_PATH . '/layout/content.php');
    $page = $content;
}