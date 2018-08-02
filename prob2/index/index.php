<?php require_once("header.php"); ?>
		<div class="head-section text-center">
			<h2>足球赔率</h2>
			<h3>描述</h3>
			<div class="text-left">
			<p>俄亥俄州立大学的peppy同学是一个铁杆球迷，不会错过任何一场球赛，也不会错过任何一场赌球。截至决赛开球前，peppy没有一场球押在了正确的球队，赔了1000多美元。<p>

			<p>为了最后一发扭亏为盈，peppy找到低年级的Cookiezi同学。据说该同学有钱有势，具有操控盘口的实力。在peppy的软磨硬泡下，Cookiezi同学决定告诉peppy最终的赔率，但是碍于行规，只给了一张图片作为线索。为了自己下半个月的房租费，peppy决定不惜一切代价找到赔率。</p>

			<p>最后的赔率是多少？</p>
			<p>（提示：相信自己的直觉）</p></div>
			<p><img src="../pic/target.jpg" alt="image" width="750px"></img><p>
			<h3></h3>
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