<?php require_once("header.php"); ?>
		<div class="head-section text-center">
			<h2>恶魔</h2>
			<h3>描述</h3>
			<div class="text-left">
			<p>恶魔即将复活，你必须找到正确的咒文才能将恶魔封印！</p></div>
			<p><img src="../pic/evil.jpeg" alt="image" width="550px"></img></p>
			<h3></h3>
			<h3>提示</h3>
			<div class="text-left">
			<p>若输入正确，则程序中的任何运算都不会出现数据溢出。</p></div>
			<form action="CheckFlag.php" method="get">
  			请提交flag：<input type="text" name="flag" />
			<!-- <button onclick="checkflag()"></button> -->
  			<input type="submit" value="提交" />
			</form>
			<!-- <p >you have solve this problem!</p> -->
			<?php 
				$fr = fopen("name", 'r');
				$name = str_replace(PHP_EOL, '', fgets($fr));
				if(file_exists("ans.txt")) {
					$fr = fopen("ans.txt", 'r');
					while(!feof($fr)) {
						$line = fgets($fr);
						$line = str_replace(PHP_EOL, '', $line); 
						if($line != "" && $line == $name) {
							echo '<p >you have solve this problem!</p>';
							break;
						}
					}
				}
			?>
		</div>

</center>
<?php require_once("footer.php"); ?>