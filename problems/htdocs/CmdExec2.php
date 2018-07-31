<?php require_once("header.php"); ?>
<pre>
<?php
  if (!(preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/m', $_GET['ip'])))
  { die("IP地址不正确！"); }
  system("ping -c 2 ".$_GET['ip']);
?>
</pre>
<?php require_once("footer.php"); ?>