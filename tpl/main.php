<?php
defined('SITE_MAIN') or die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
  <title>punt: <?php echo $page_title; ?></title>
  <link rel='stylesheet' type='text/css' href='css/global.css' />
</head><body>

<div id='title'>
  unt
</div><div id='nav'>
  [<a href='./'>home</a>]
  [<a href='index.php?p=updates'>updates</a>]
  [<a href='index.php?p=manual'>manual</a>]
  [<a href='forum/'>forum</a>]
</div>

<?php echo $page_text; ?>

</body></html>

