<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
$uri        = $_SERVER['REQUEST_URI'];
$uri        = str_ireplace(BASE_URL . '/', '', $uri);
$uri        = preg_replace('/^([^?]*).*$/', '$1', $uri);
$address    = preg_split('/[\/]/', $uri);
$address    = array_filter($address);
if (empty($address)) {
    $address = array('default');
}
$module		= reset($address);
if (!is_dir("modules/{$module}")) {
    array_unshift($address, 'default');
}
if (count($address) == 1) {
	$address[]	= 'index';
}
unset($uri, $module);