<?php
    $user = $_GET['user'];
    file_put_contents("name", $user . "\n");
    header("location:index.php");
?>