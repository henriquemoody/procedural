<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}

require_once(BASE_PATH . '/functions/anchor.php');
$breadcrumbs = '';
if (isset($conf['navigation']) && is_array($conf['navigation'])) {
    foreach($conf['navigation'] as  $nav) {
        if (!isset($nav['page']) || $nav['page'] != $address[1]) {
            continue;
        }
        $params = array();
        $params['module']   = isset($nav['module']) ? $nav['module'] : 'default';
        $params['page']     = $nav['page'];
        $breadcrumbs .= anchor($nav['title'], $params);
        if (!isset($address[2]) || !isset($nav['pages']) || !is_array($nav['pages'])) {
            break;
        }
        foreach($nav['pages'] as  $subnav) {
            if (!isset($subnav['page']) || $subnav['page'] != $address[2]) {
                continue;
            }
            $breadcrumbs .= " {$conf['title_separator']} ";
            $params['subpage'] = $subnav['page'];
            $breadcrumbs .= anchor($subnav['title'], $params);
        }
    }
}
