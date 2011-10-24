<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
require_once(BASE_PATH . '/core/settings.php');
require_once(BASE_PATH . '/core/route.php');

$copy       = $address;
$module     = array_shift($copy);
if(file_exists(BASE_PATH . "/modules/{$module}/settings.php")) {
    require_once(BASE_PATH . "/modules/{$module}/settings.php");
}
$filename   = BASE_PATH . "/modules/{$module}/pages/";
$filename   .= implode('_', $copy);
$filename   .= '.php';
if (!file_exists($filename)) {
    $filename = BASE_PATH . "/modules/error/pages/404.php";
}
$functions = BASE_PATH . "/functions";
if (($dh = opendir($functions))) {
while (($function = readdir($dh)) !== false) {
    $function = $functions .'/' . $function;
        if (!is_dir($function)) {
            require_once($function);
        }
    }
    closedir($dh);
}
unset($copy);