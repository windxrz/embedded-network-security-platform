<?php  
if($_POST[user] && $_POST[pass]) {
    $con =  mysql_connect("www.db4free.net","bluesky","12345678");
    mysql_select_db("mysql_sky_db");

    $user = $_POST[user];
    $pass = md5($_POST[pass]);
    $query = @mysql_fetch_array(mysql_query("select username from tlb where (username='$user') and (password='$_POST[pass]')"));

    if($query[username]=="admin") {
         echo "<p>Logged in! Key: mysqlisreallyhard </p>";
    }
    if($query[username] != "admin") {
         echo("<p>You are not admin!</p>");
    }
}

?>


