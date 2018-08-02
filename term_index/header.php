<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../../js/jquery.min.js"></script>
		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="../../js/move-top.js"></script>
		<script type="text/javascript" src="../../js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!---- start-smoth-scrolling---->
		 <!-- Custom Theme files -->
		<link href="../../css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
	</head>
	<body>
		<!----- start-header---->
			<div id="home" class="header">
					<div class="top-header bounceInDown" data-wow-delay="0.4s">
						<div class="container">
						<div class="logo">
							<a href="#">THUCTFEP</a>
						</div>
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li class="active"><a href="http://192.168.1.2:7070/index.php">Home</a></li>
								<?php
									if(file_exists("name")) {
										echo '<a>aaaa</a>';
										$fr = fopen("name", 'r');
										$line = str_replace(PHP_EOL, '', fgets($fr));
										if($line != "") {
											$name = $line;
											$name = str_replace(PHP_EOL, '', $name);
											echo '<li><a> welcome,   ' . $name . '</a></li>';
											echo '<li><a><form action="LogOut.php" method="get"><input type="submit" value="LogOut" /></form></a></li>';
										}
										else {
											echo '<li><a><form action="LogIn.php" method="get"><input type="text", name="user" /><input type="submit" value="LogIn" /></form></a></li>';
										}
									}
								?>
								<!-- <li>
								<form action="LogIn.php" method="get">
								<input type="text", name="user" />
								<input type="submit" value="提交" />
								</form>
								</li>
								<li>
								<form action="LogOut.php" method="get">
								<input type="submit" value="提交" />
								</li> -->
								<!-- <li><a href="http://192.168.1.2:7070/index.php#term">Term</a></li>
								<li><a href="http://192.168.1.2:7070/index.php#contest">Contest</a></li>
								<li><a href="http://192.168.1.2:7070/index.php#develop">Develop</a></li>
								<li><a href="http://192.168.1.2:7070/index.php#contact">Contact</a></li> -->
								<!-- <li class="team-active"><a href="#team" class="scroll">TEAM</a></li> -->
							</ul>
							<!-- <a href="#" id="pull"><img src="../../images/nav-icon.png" title="menu" /></a> -->
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		<!----- //End-header---->
		<!----start-slider-script---->
			<script src="../../js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	<h3></h3>
	<h3></h3>
	<div class="head-section text-center">
		<h2></h2>
		<h2></h2>
		<h2></h2>
		<h2></h2>
		<h2></h2>
		<h2></h2>
		<h2></h2>
	</div>
