<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
$title= $conf['title'];
if (isset($conf['navigation']) && is_array($conf['navigation'])) {
    foreach($conf['navigation'] as  $nav) {
        if (!isset($nav['page']) || $nav['page'] != $address[1]) {
            continue;
        }
        $title .= " {$conf['title_separator']} ";
        $title .= $nav['title'];
        if (!isset($address[2]) || !isset($nav['pages']) || !is_array($nav['pages'])) {
            break;
        }
        foreach($nav['pages'] as  $subnav) {
            if (!isset($subnav['page']) || $subnav['page'] != $address[2]) {
                continue;
            }
            $title .= " {$conf['title_separator']} ";
            $title .= $subnav['title'];
        }
    }
}
