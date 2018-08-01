<?php require_once("header.php"); ?>
		<div class="head-section text-center">
			<h2>Problem1</h2>
			<p>this is a pwn problem, the source code can be downloaded using following link :</p>
			<a href="download.php?file=program/program">程序下载</a>
			<form action="CheckFlag.php" method="get">
  		请提交flag：<input type="text" name="flag" />
			<input type="text", name="user" />
			<!-- <button onclick="checkflag()"></button> -->
  		<input type="submit" value="提交" />
			</form>
			<!-- <p >you have solve this problem!</p> -->
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