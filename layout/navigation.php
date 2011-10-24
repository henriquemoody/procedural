<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
require_once(BASE_PATH . '/functions/anchor.php');
/**
 * Este arquivo avalia o array $conf['navigation'] e cria o menu de navegação
 */
$navigation = '';
if(isset($conf['navigation']) && is_array($conf['navigation']) && !empty ($conf['navigation'])) {
    $navigation = '<ul>';
    $i = 0;
    $j = count($conf['navigation']);
    foreach($conf['navigation'] as $value ) {
        $classes = array();
        if ($i++ === 0) {
            $classes[] = 'first';
        }
        if ($i === $j) {
            $classes[] = 'last';
        }
        $name = $value['page'];
        if($address[1] == $name) {
            $classes[] = 'active';
        }
        $params = array();
        $params['module']   = isset($value['module']) ? $value['module'] : 'default';
        $params['page']     = $value['page'];
        if ($name === 404) {
            continue;
        }
        $navigation .= '<li';
        if(!empty ($classes)) {
            $navigation .= ' class="'. implode(' ', $classes) .'"';
        }
        $navigation .= '>';
        $navigation .= anchor($value['title'], $params);

        if (isset($value['pages']) && is_array($value['pages']) && !empty ($value['pages'])) {
            $navigation .= '<ul>';
            $k = 0;
            $l = count($value['pages']);
            foreach($value['pages'] as  $subValue ) {
                $classes = array();
                if ($k++ === 0) {
                    $classes[] = 'first';
                }
                if ($k === $l) {
                    $classes[] = 'last';
                }
                $params['subpage'] = $subValue['page'];
                $subName  = $subValue['page'];
                if($address[1] == $name && isset($address[2]) && $address[2] == $subName) {
                    $classes[] = 'active';
                }
                $navigation .= '<li';
                if(!empty ($classes)) {
                    $navigation .= ' class="'. implode(' ', $classes) .'"';
                }
                $navigation .= '>';
                $navigation .= anchor($subValue['title'], $params);
                $navigation .= '</li>';
            }
            $navigation .= '</ul>';
        }

        $navigation .= '</li>';
    }
    $navigation .= '</ul>';
}