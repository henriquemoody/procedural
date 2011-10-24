<?php
// Checagem para o arquivo não ser incluído diretamente
if (!defined('ON_INDEX_SALT')) {
    exit;
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <h1><?php echo anchor($title, array('page' => 'index')); ?></h1>
        <div id="nav">
            <?php echo $navigation; ?>
        </div>
        <div id="breadcrumbs">
            <?php echo $breadcrumbs; ?>
        </div>
        <div id="content">
            <?php echo $content; ?>
        </div>
    </body>
</html>
