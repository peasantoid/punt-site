<?php
defined('SITE_MAIN') or die;

$page_title .= 'manual';

$section = trim((string)@$_GET['s'], '.');
if(strstr($section, '/')) {
  $page_title .= ': error';
  echo 'Illegal section name: <code>' .
    htmlspecialchars($section) .
    "</code>\n";
  return;
}

$path = 'manual/' . str_replace('.', '/', $section);
$rest = array();
$components = array('<a href=\'index.php?p=manual\'>manual</a>');
foreach(explode('.', $section) as $key => $val) {
  if($val == '') { continue; }
  $rest[] = $val;
  $components[] = '<a href=\'index.php?p=manual&amp;s=' .
    implode('.', $rest) .
    "'>$val</a>";
}
$section = implode('.', $rest);

if(is_file($path)) {
  $page_title .= ": $section";
  echo implode('.', $components) . "\n\n";


  echo '<pre>' .
    trim(htmlspecialchars(file_get_contents("$path"))) .
    "</pre>\n";
} else if(is_dir($path)) {
  $page_title .= ": $section";
  echo implode('.', $components) . "\n\n";


  if(is_file("$path/_desc.txt")) {
    echo '<pre>' . 
      trim(htmlspecialchars(file_get_contents("$path/_desc.txt"))) .
      "</pre>\n\n";
  }

  $list = array_diff(
    scandir($path),
    array('.', '..', '.DS_STORE', '.git', '_desc.txt'));
  echo "<ul>\n";
  foreach($list as $key => $val) {
    $sep = ($section != '') ? '.' : '';
    echo "\t<li><a href='index.php?p=manual&amp;s=$section$sep$val'>$val</a>";
    if(is_dir("$path/$val")) {
      echo ' +';
    }
    echo "</li>\n";
  }
  echo "</ul>\n";
} else {
  $page_title .= ': error';
  echo 'Unknown section: <code>' . 
    htmlspecialchars($section) . 
    "</code>\n";
  return;
}

?>
