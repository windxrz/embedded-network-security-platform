<?php require_once("header.php"); ?>
		<div class="head-section text-center">
			<h2>凉宫春日的消失</h2>
			<h3>描述</h3>
			<p>第三章</p>
			<div class="text-left">
			<p>十二月二十日，阿虚从离开病榻回到班上的谷口得知春日目前的学校，同时还在她身边发现古泉。说明原委后，原本就憧憬着超自然现象的春日随阿虚来到北高，将实玖瑠从书法社拉到文艺社教室。当春日、古泉、实玖瑠和长门重新在社团教室聚首之时，电脑忽然自行启动... :</p></div>
			<p><img src="../images/target.jpg" alt="image" width="750px"></img><p>
			<p>任务: 帮助阿虚触发【紧急逃离程式】</p>
			<a href="download.php?file=program">程序下载</a>
			<p>访问地址: 192.168.1.11:10000</p>
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