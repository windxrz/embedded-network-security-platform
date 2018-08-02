<?php require_once("header.php");?>
	<!----//End-slider-script---->
	<!----- //End-slider---->
	<!---- top-grids ---->
	<div id="Term" class="top-grids text-center">
		<div class="head-section text-center">
			<center>
			<h2>Term Name</h2>
			<p>Available Problems are as Following</p>
			</center>
		</div>
		<pre>
		<?php
			$host_ip = exec("configure_edison --showWiFiIP");
			//echo $host_ip . "\n";
			if(empty($host_ip)) {
				echo "fail get host ip : something wrong!";
				exit("error");
			}

			//echo "welcome to the term : " . $host_ip . "\n";
			//echo "avialible problems are as following :" . "\n";

			$file = fopen("question", 'r');
			$num = 2;
			while(!feof($file)) {
				$line = fgets($file);
				$tar = explode("*/*", $line);
				$port = $tar[0];
				$name = $tar[1];
				$type = $tar[2];
				$str_num = strval($num);
				echo '<div style="width:800px;height:55px;">';
				echo '<div style="float:left;width:50px;height:50px;">';
				echo '<div class="top-grid"><spansmall>';
				echo '<labelsmall class="icon' . $str_num . '"></spansmall></div></div>';
				echo '<div style="float:left;width:325px;height:50px;">';
				echo '<h4><a href="http://' . $host_ip . ':' . $port . '"' .  ' target="_blank">' . str_replace(PHP_EOL, '', $name) . "</a></h4></div>";
				echo '<div style="float:left;width:325px;height:50px;">';
				echo '<h4>' . '  :  ' . $host_ip . ':' . $port . '</h4></div>';
				echo '<div style="float:left;width:100px;height:50px;">';
				echo '<h4>' . $type . '</h4></div>';
;				echo '</div>';
				//echo "  :  " . $host_ip . ":" . $port;
				$num = $num + 1;
				if($num > 3) {
					$num = 1;
				}
			}
			fclose($file);
		?>
		</pre>
		<!-- <div class="container">
			<div class="col-md-4">
				<div class="top-grid">
					<span><label class="icon1"> </label></span>
					<h3><a href="#">TERM 1</a></h3>
					<p>now available</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="top-grid">
					<span><label class="icon2"> </label></span>
					<h3><a href="#">TERM 2</a></h3>
					<p>now available</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="top-grid">
					<span><label class="icon3"> </label></span>
					<h3><a href="#">TERM 3</a></h3>
					<p>now available</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div> -->
	</div>
	<!---- contact ---->
	<div class="clearfix"> </div>
	<!--- footer ---->
<?php require_once("footer.php");?>			