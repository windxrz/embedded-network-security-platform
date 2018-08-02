<?php
  $InputFlag = $_GET['flag'];
    $fr = fopen("name", 'r');
    $user = str_replace(PHP_EOL, '', fgets($fr));
    fclose($fr);
  $command = escapeshellcmd("python -u check.py " . urlencode($InputFlag));
  exec($command, $output, $return_var);
  if($output[0] == "ok") {
    if(file_exists("ans.txt")) {
        $fr = fopen("ans.txt", 'r');
        $al = 0;
        while(!feof($fr)) {
            $line = fgets($fr);
            if($line != "" && $line == $user) {
                $al = 1;
            }
        }
        fclose($fr);
    }
    if($al == 0) {
        file_put_contents("ans.txt", $user . "\n", FILE_APPEND);
    } 
  }
  header("location:index.php");
?>