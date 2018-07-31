<!-- <?php require_once("header.php"); ?> -->
<!DOCTYPE html>
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>暂时标题（后续由主服务器传参）</title>
 </head>
<body>
<pre>
<?php
    $host_name = exec("hostname");
    echo $host_name . "\n";
    $host_ip = gethostbyname($host_name);
    echo $host_ip . "\n";
    //echo 234;
    if(empty($host_ip) || $host_ip == $host_name) {
        echo 'document.write("fail get host ip : something wrong!");\n';
        exit("error");
    }

    $file = fopen("question", 'r');
    while(!feof($file)) {
        $line = fgets($file);
        $tar = explode("*/*", $line);
        $port = $tar[0];
        $name = $tar[1];
        echo $host_ip . ":" . $port . "\n";
        echo $port . "\n";
        echo $name . "\n";
        /* echo '<a href=\"<?php $host_ip + \":\" + $port?>\"><?php echo $name ?></a>' . "\n"; */
        /*echo 'href="' . $host_ip . ':' . $port . '">' . $name . '</a>'; */
        echo '<a href="' . $host_ip . ':' . $port . '">' . $name . '</a>';
    }
    fclose($file);
?>
</pre>
  </body>
</html> 