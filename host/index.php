<?php require_once("header.php"); ?>
	<!-- Slideshow 4 -->
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			<li>
				<img src="../../images/slide1.jpg" alt="">
				<div class="caption bounceInDown" data-wow-delay="0.6s">
				<div class="slide-text-info">
					<span>THU CTF EMBEDED<label> PLATFORM</label></span>
					<h1>WELCOME TO THE CTF WORLD!</h1>
					<!-- <div class="slide-btns">
						<a class="startnow" href="#">GET STARTED NOW</a>
						<a class="livedemo" href="#">LIVE DEMO</a>
					</div> -->
				</div>
				</div>
			</li>
			<li>
				<img src="../../images/slide2.jpg" alt="">
			<div class="caption">
				<div class="slide-text-info bounceInDown" data-wow-delay="0.6s">
					<span>CURRENT MOST POPULAR <label>CONTEST</label></span>
					<h1>THU CTF</h1>
					<!-- <div class="slide-btns">
						<a class="startnow" href="#">GET STARTED NOW</a>
						<a class="livedemo" href="#">LIVE DEMO</a>
					</div> -->
				</div>
				</div>
			</li>
			<li>
				<img src="../../images/slide1.jpg" alt="">
				<div class="caption">
				<div class="slide-text-info bounceInDown" data-wow-delay="0.6s">
					<span>HOW TO BE A <label>DEVELOPER</label></span>
					<h1>WELCOME TO JOIN US!</h1>
					<!-- <div class="slide-btns">
						<a class="startnow" href="#">GET STARTED NOW</a>
						<a class="livedemo" href="#">LIVE DEMO</a>
					</div> -->
				</div>
				</div>
			</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	<!----- //End-slider---->
	<!---- top-grids ---->
	<div id="term" class="top-grids text-center">
		<h3>Current Available Term</h3>
		<pre>
		<?php
			$host_ip = exec("configure_edison --showWiFiIP");
			// echo $host_ip . "\n";
			if(empty($host_ip)) {
				echo "fail get host ip : something wrong!";
				exit("error");
			}

			// echo "current host ip is : " . $host_ip . "\n";
			// echo "avialible terms are as following :" . "\n";

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
			$num = 1;
			echo '<div class="container">';
			foreach($files as $file) {
				if($file != "." && $file != "..") {
					if(is_dir($dir . $file)) {
						echo "wrong IPs format : no directery allowed!\n";
						exit("error");
					}
					else {
						$str_num = strval($num);
						$curfile = $dir . "/" . $file;
						$fr = fopen($curfile, "r");
						while(!feof($fr)) {
							$line  = fgets($fr);
							$line = str_replace(PHP_EOL, '', $line); 
							if(!empty($line)) {
								$port = "7070";
								echo '<div class="col-md-4"><div class="top-grid"><span>';
								echo '<label class="icon' . $str_num . '">';
								echo '</label></span>';
								echo '<h3><a href="http://' . $line . ':' . $port . '">' . $file . '</a></h3>';
								echo '<p>now available</p></div></div>';
								// echo "   term ip is : " . $line . ':' . $port . "\n";
							}
						}
						fclose($fr);
						$num = $num + 1;
						if($num > 3) {
							$num = 1;
						}
					}
				}
			}
			echo '<div class="clearfix"> </div></div>';
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
	<!---- top-grids ---->
	<div id="contest" class="top-grids text-center">
		<h3>Current Contest</h3>
		<pre>
		<?php
			$host_ip = exec("configure_edison --showWiFiIP");
			if(empty($host_ip)) {
				echo "fail get host ip : something wrong!";
				exit("error");
			}

			$dir = "/home/root/IPs";
			$files = scandir($dir);
			$num = 1;
			echo '<div class="container">';
			foreach($files as $file) {
				if($file != "." && $file != "..") {
					if(is_dir($dir . $file)) {
						echo "wrong IPs format : no directery allowed!\n";
						exit("error");
					}
					else {
						$str_num = strval($num);
						$curfile = $dir . "/" . $file;
						$fr = fopen($curfile, "r");
						while(!feof($fr)) {
							$line  = fgets($fr);
							$line = str_replace(PHP_EOL, '', $line); 
							if(!empty($line)) {
								$port = "7070";
								echo '<div class="col-md-4"><div class="top-grid"><span>';
								echo '<label class="icon' . $str_num . '">';
								echo '</label></span>';
								echo '<h3><a href="http://' . $line . ':' . $port . '">' . $file . '</a></h3>';
								echo '<p>now available</p></div></div>';
								// echo "   term ip is : " . $line . ':' . $port . "\n";
							}
						}
						fclose($fr);
						$num = $num + 1;
						if($num > 3) {
							$num = 1;
						}
					}
				}
			}
			echo '<div class="clearfix"> </div></div>';
		?>
		</pre>
	</div>
	<div id="develop" class="skills">
		<div class="container">
		<div class="head-section text-center">
			<h2>Our Skills</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor i</p>
		</div>
		<div class="services_grids">
				<div id="canvas">
					<div class="skill-grids text-center">
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-1"></div>									
										<h3>HTML</h3>	
									</div>								  
							</div>
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-2"></div>									
										<h3>CSS</h3>	
									</div>								  
							</div>
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-3"></div>									
										<h3>Photoshop</h3>	
									</div>								  
							</div>
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-4"></div>									
										<h3>Illustrator</h3>	
									</div>								  
							</div>
							<div class="clearfix"> </div>
						</div>
				</div>
		</div>
		<!---->
			<script type="text/javascript" src="../../js/circles.js"></script>
						<script>
						var colors = [
								['#DFDFDF', '#AF48FE'], ['#DFDFDF', '#AF48FE'], ['#DFDFDF', '#AF48FE'], ['#DFDFDF', '#AF48FE']
							];
						for (var i = 1; i <= 5; i++) {
							var child = document.getElementById('circles-' + i),
								percentage = 50 + (i * 10);
								
							Circles.create({
								id:         child.id,
								percentage: percentage,
								radius:     80,
								width:      15,
								number:   	percentage / 10,
								text:       '%',
								colors:     colors[i - 1]
							});
						}
				
		</script>
		<!--/-->
	</div>
	<!---- skills --->
	<!---- contact ---->
	<div id="contact" class="team">
		<div class="container">
			<div class="head-section text-center">
				<h2>Our Team</h2>
				<p>CST, grade 3, Tsinghua University</p>
			</div>
			<!---- team-grids ---->
			<div class="team-grids text-center">
				<div class="col-md-4">
					<div class="team-grid">
						<img class="img-responsive t-pic" src="../../images/t1.jpg" title="name" />
						<h3>席照炜</h3>
						<span>to be continue</span>
						<p>to be continue </p>
						<ul class="team-social">
							<li><a class="facebook" href="#"><span> </span></a></li>
							<li><a class="google-pluse" href="#"><span> </span></a></li>
							<li><a class="twitter" href="#"><span> </span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team-grid">
						<img class="img-responsive t-pic" src="../../images/t2.jpg" title="name" />
						<h3>徐韧喆</h3>
						<span>to be continue</span>
						<p>to be continue </p>
						<ul class="team-social">
							<li><a class="facebook" href="#"><span> </span></a></li>
							<li><a class="google-pluse" href="#"><span> </span></a></li>
							<li><a class="twitter" href="#"><span> </span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team-grid">
						<img class="img-responsive t-pic" src="../../images/t3.jpg" title="name" />
						<h3>毛宇飞</h3>
						<span>to be continue</span>
						<p>to be continue</p>
						<ul class="team-social">
							<li><a class="facebook" href="#"><span> </span></a></li>
							<li><a class="google-pluse" href="#"><span> </span></a></li>
							<li><a class="twitter" href="#"><span> </span></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!---- team-grids ---->
		</div>
		<div class="container">
			<div class="head-section text-center">
					<h2>Get in touch</h2>
					<p>LLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor i</p>
			</div>
			<!---- contact-grids ---->
			<div class="contact-grids">
				<div class="contact-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3256420.00766152!2d-94.8190527877968!3d37.15037720226864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1405259548831"> </iframe>
				</div>
			</div>
			<!---- contact-grids ---->
		</div>
	</div>
	<div class="clearfix"> </div>
	<!---- contact ---->
	<!-- <div class="clearfix"> </div> -->
<?php require_once("footer.php"); ?>