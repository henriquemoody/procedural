<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}

/* Função url() */
require_once(BASE_PATH . '/functions/url.php');

/**
 * Retorna um link a partir dos parêmetros
 *
 * @param string $content Content of the link
 * @param array $params
 * @param array[optional] $attributes
 * @return string
 */
function anchor($content, array $params, array $attributes = array())
{
    $attributes['href'] = url($params);
    $link = '<a';
    foreach($attributes as $attribute => $value ) {
        $value = htmlentities($value);
        $link .= " {$attribute}=\"{$value}\"";
    }
    $link .= ">{$content}</a>";
    return $link;
}
