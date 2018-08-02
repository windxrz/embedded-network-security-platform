<?php
  $InputFlag = $_GET['flag'];
  $username = $_GET['user'];
  $command = escapeshellcmd("python -u check.py " . urlencode($InputFlag) . " " . urlencode($username));
  exec($command, $output, $return_var);
  if($output[0] == "ok") {
    if(file_exists("ans.txt")) {
        $fr = fopen("ans.txt", 'r');
        $al = 0;
        while(!feof($fr)) {
            $line = fgets($fr);
            if($line == $_GET['user']) {
                $al = 1;
            }
        }
        fclose($fr);
    }
    if($al == 0) {
        file_put_contents("ans.txt", $_GET['user'] . "\n", FILE_APPEND);
    } 
  }
  header("location:index.php");
?>