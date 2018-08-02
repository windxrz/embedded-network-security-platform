<?php require_once("header.php"); ?>
	<!-- Slideshow 4 -->
		<a id="homepos"></a>
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			<li>
				<img src="../../images/slide1.jpg" alt="">
				<div class="caption bounceInDown" data-wow-delay="0.6s">
				<div class="slide-text-info">
					<span>THU CTF EMBEDDED<label> PLATFORM</label></span>
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
	<a id="termpos"></a>
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
		<a id="contestpos"></a>	
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
	<a id="developpos"></a>
	<div id="develop" class="skills">
		<div class="container">
		<div class="head-section text-center">
			<h2>What can you do</h2>
			<p>As a user of THUCTFEP, you can do</p>
		</div>
		<div class="services_grids">
				<div id="canvas">
					<div class="skill-grids text-center">
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-1"></div>				
										<h3>Answer Problems</h3>	
									</div>								  
							</div>
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-2"></div>									
										<h3>Add Problems</h3>	
									</div>								  
							</div>
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-3"></div>				
										<h3>Hold Contest</h3>	
									</div>								  
							</div>
							<div class="col-md-3">	
								<div class="skill-grid">
									<div class="circle" id="circles-4"></div>									
										<h3>Add Term</h3>	
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
	<a id="contactpos"></a>
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
						<img class="img-responsive t-pic" src="../../images/t1.jpeg" title="name" />
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
						<img class="img-responsive t-pic" src="../../images/t2.jpeg" title="name" />
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
						<img class="img-responsive t-pic" src="../../images/t3.jpeg" title="name" />
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
					<p>This embedded platform belongs to Tsinghua University, developed by Team5, Network Security, 2018 Summer.</p>
			</div>
			<!---- contact-grids ---->
			<div class="contact-grids">
				<div class="contact-map">
					<center>
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAcwERFylnrWGgdWtW5UA4K4lhy70dpI9A'></script><div style='overflow:hidden;height:400px;width:520px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://stilvolle-raumgestaltung.de/'>möbel</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=16eab00966d2d04b70b3cd0f1cf8750692ecd822'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(39.9996674,116.32644389999996),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(39.9996674,116.32644389999996)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br><br> 北京清华大学<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
					</center>
				</div>
			</div>
			<!---- contact-grids ---->
		</div>
	</div>
	<div class="clearfix"> </div>
	<!---- contact ---->
	<!-- <div class="clearfix"> </div> -->
<?php require_once("footer.php"); ?>