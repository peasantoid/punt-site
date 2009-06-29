<?php
define('SITE_MAIN', true);

set_magic_quotes_runtime(0);

$page_title = '';
ob_start();
$p = (string)@$_GET['p'];
switch($p) {
  case 'manual':
    require_once 'pages/manual.php';
    break;
  default:
    require_once 'pages/default.php';
    break;
}
$page_text = ob_get_clean();

require_once 'tpl/main.php';

