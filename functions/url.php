<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}

/**
 * Retorna uma url a partir dos parâmetros
 *
 * @param array $params
 * @return string
 */
function url(array $params) {
    $uriParams = array();
    // Check the module
    if (isset($params['module']) && $params['module'] != 'default') {
        $uriParams[] = $params['module'];
    }
    // Check the page
    if (isset($params['page']) && $params['page'] != 'index') {
        $uriParams[] = $params['page'];
        // Check the subpage
        if (isset($params['subpage'])) {
            $uriParams[] = $params['subpage'];
        }
    }
    unset($params['module'], $params['page'], $params['subpage']);
    $url = BASE_URL;
    if (!empty ($uriParams)) {
        $url .= '/';
        $url .= implode('/', $uriParams);
    }
    if(!empty($params)) {
        $url .= '?';
        $url .= http_build_query($params, '', '&');
    }
    return $url;
}