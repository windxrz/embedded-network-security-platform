<!-- <?php require_once("header.php"); ?> -->
<!DOCTYPE html>
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>THUctf-term</title>
 </head>
<body>
    清华大学嵌入式终端ctf实验平台
<pre>
<?php
    // $host_name = exec("hostname");
    // echo $host_name . "\n";
    // $host_ip = gethostbyname($host_name);
    // echo $host_ip . "\n";
    //echo 234;
    $host_ip = exec("configure_edison --showWiFiIP");
    echo $host_ip . "\n";
    if(empty($host_ip)) {
        echo "fail get host ip : something wrong!";
        exit("error");
    }

    echo "current host ip is : " . $host_ip . "\n";
    echo "avialible terms are as following :" . "\n";

    // $file = fopen("question", 'r');
    // while(!feof($file)) {
    //     $line = fgets($file);
    //     $tar = explode("*/*", $line);
    //     $port = $tar[0];
    //     $name = $tar[1];
    //     echo $host_ip . ":" . $port . "\n";
    //     echo $port . "\n";
    //     echo $name . "\n";
    //     echo '<a href="http://192.168.1.2:7070">ahah</a>\n';
    //     echo '<a href="http://' . $host_ip . ':' . $port . '"' .  ' target="_blank">' . str_replace(PHP_EOL, '', $name) . "</a>";
    //     echo "\n";
    // }
    // fclose($file);

    $dir = "/home/root/IPs";
    $files = scandir($dir);
    foreach($files as $file) {
        if($file != "." && $file != "..") {
            if(is_dir($dir . $file)) {
                echo "wrong IPs format : no directery allowed!\n";
                exit("error");
            }
            else {
                $curfile = $dir . "/" . $file;
                $fr = fopen($curfile, "r");
                while(!feof($fr)) {
                    $line  = fgets($fr);
                    $line = str_replace(PHP_EOL, '', $line); 
                    if(!empty($line)) {
                        $port = "7070";
                        echo '<a href="http://' . $line . ':' . $port . '">' . $file . '</a>';
                        echo "   term ip is : " . $line . ':' . $port . "\n";
                    }
                }
                fclose($fr);
            }
        }
    }

?>
</pre>
  </body>
</html> 