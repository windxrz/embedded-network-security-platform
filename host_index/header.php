<!DOCTYPE HTML>
<html>
	<head>
		<title>THUCTFEP</title>
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
								<li class="active"><a href="#home" class="scroll">Home</a></li>
								<li><a href="#term" class="scroll">Term</a></li>
								<li><a href="#contest" class="scroll">Contest</a></li>
								<li><a href="#develop" class="scroll">Develop</a></li>
								<li><a href="#contact" class="scroll">Contact</a></li>
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
			<!----//End-slider-script---->