<?php require_once("header.php"); ?>
  <div class="head-section text-center">
    <h2>XSS</h2>
    <h3>描述</h3>
    <div class="text-left">
      <p>
        以下链接会前往xss源站点：<a href="http://192.168.1.10:7074/hack.php" rel="external nofollow">xss</a>
      </p>
      <p>
        网页源代码链接：<a href="http://192.168.1.10:7074/hack.txt" rel="external nofollow">source</a>
      </p>
      <p>
        如果能够调用console.log()输出任何内容，即xss成功。
      </p>
    </div>

    <h3></h3>
    <form action="CheckFlag.php" method="get">
      提交网页链接：hack.php?name=<input type="text" name="flag" />
      <input type="text", name="user" />
      <input type="submit" value="提交" />
    </form>
    <?php 
      if(file_exists("ns.txt")) {
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