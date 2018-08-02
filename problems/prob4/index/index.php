<?php require_once("header.php"); ?>
  <div class="head-section text-center">
    <h2>XSS</h2>
    <h3>描述</h3>
    <div class="text-left">
    <p>以下链接会前往xss源站点：<a href="http://192.168.1.10:7074/hack.php" rel="external nofollow">xss</a></p></div>

    <h3></h3>
    <form action="CheckFlag.php" method="get">
      请提交flag：<input type="text" name="flag" />
    <input type="text", name="user" />
    <!-- <button onclick="checkflag()"></button> -->
      <input type="submit" value="提交" />
    </form>
    <?php 
      if(file_exists("ans.txt")) {
        $fr = fopen("ans.txt", 'r');
        while(!feof($fr)) {
          $line = fgets($fr);
          $line = str_replace(PHP_EOL, '', $line); 
          if($line == "admin") {
            echo '<p >you have solve this problem!</p>';
          }
        }
      }
    ?>
  </div>
  </center>
<?php require_once("footer.php"); ?>