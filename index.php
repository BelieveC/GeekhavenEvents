<?php

	include('connection.php');
	$currenttime = date("Y-m-d h:i:sa");
	$countdown;
	$comingupeventswingid;
	$comingupeventsdescription;
	$q = "SELECT * FROM events ORDER BY datetime ASC";
	$r = mysqli_query($dbc, $q);
	while($event= mysqli_fetch_assoc($r))
	{
		$to_time = strtotime($event['datetime']);
		$from_time = strtotime($currenttime);
		if(round($to_time - $from_time,0) > 0){
			$countdown = round($to_time - $from_time,0);
			$comingupeventswingid = $event['wingid'];
			$comingupeventsdescription = $event['description'];
			break;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Events | GeekHaven</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GeekHaven Events Competitive Coding Web Networking Tesla FOSS Graphics" />
<script type="applisalonion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<link rel="stylesheet" href="css/swipebox.css">
<link rel="stylesheet" href="css/flipclock.css">
<link href="css/font-awesome.min.css" rel='stylesheet' type='text/css' />	
<!--//Custom Theme files-->
<!--web-font-->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700' rel='stylesheet' type='text/css'>
<!--//web-font-->
<script src="js/jquery.min.js"></script>
<script src="js/flipclock.min.js"></script>


<link rel="icon" 
      type="image/png" 
      href="images/geekhaven.png">
</head>
<body>
<!--banner-->
<div class="banner">
	<div class="container">
		<div class="col-md-3 b-part1">
			<a href="index.php"><img src="images/geekhaven.png" alt=" " /></a>
			<h1>GeekHaven</h1>
			<h2>Events</h2>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--//banner-->
<!-- Flipclock Js -->
<div class="container-fluid eventcounter">
	<div class="rows">
		<div class="col-md-14 cominguprow">
			<h1 class="cominguphead">Excitement coming up</h1>
		</div>
		
		<div class="col-md-5">
			<?php 
				switch ($comingupeventswingid) {
				 	case 1:
				 		?>
				 		<img src="images/web.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	case 2:
				 		?>
				 		<img src="images/coding.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	case 3:
				 		?>
				 		<img src="images/app.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	case 4:
				 		?>
				 		<img src="images/foss.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	case 5:
				 		?>
				 		<img src="images/network.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	case 6:
				 		?>
				 		<img src="images/design.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	case 7:
				 		?>
				 		<img src="images/tesla.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	case 8:
				 		?>
				 		<img src="images/cyber.jpg" alt="" class="img-responsive">
				 		<?php
				 		break;
				 	}
			?>
		</div>
		<div class="col-md-7">
			<div class="clock"></div>

			<script type="text/javascript">
				var clock = $('.clock').FlipClock(<?php echo abs($countdown); ?>, {
					clockFace: 'DailyCounter',
					countdown: true
				});
			</script>
			<br>
			<h2><?php 
				switch ($comingupeventswingid) {
				 	case 1:
				 		echo "Web Development Wing";
				 		break;
				 	case 2:
				 		echo "Competitive Coding Wing";
				 		break;
				 	case 3:
				 		echo "App Development Wing";
				 		break;
				 	case 4:
				 		echo "FOSS Wing";
				 		break;
				 	case 5:
				 		echo "NetWorking Wing";
				 		break;
				 	case 6:
				 		echo "Graphics Wing";
				 		break;
				 	case 7:
				 		echo "Tesla Wing";
				 		break;
				 	case 8:
				 		echo "Cyber Security Wing";
				 		break;
				 } 
				


				?>
			</h2>
			<h4><?php echo $comingupeventsdescription; ?></h4>
		</div>
	</div>
</div>
		
<!--Events-->
<div id="portfolio" class="portfolio">
		<div class="container">
			<h3>Upcoming Event Mania</h3>
			<label class="line"></label>
			<div class="sap_tabs">			
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list wow fadeInUp animated" data-wow-delay=".7s">
						<li class="resp-tab-item"><span>Workshops</span></li>
						<li class="resp-tab-item"><span>Hackathons</span></li>
						<li class="resp-tab-item"><span>TriHacker</span></li>
						<li class="resp-tab-item"><span>Other</span></li>					
					</ul>	
					<div class="clearfix"> </div>	
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content">
							<div class="tab_img">
	
							<?php
								$currenttime = date("Y-m-d h:i:sa");
								$q = "SELECT * FROM events ORDER BY datetime ASC";
								$r = mysqli_query($dbc, $q);
								while($event= mysqli_fetch_assoc($r))
								{
									$to_time = strtotime($event['datetime']);
									$from_time = strtotime($currenttime);
									if(round($to_time - $from_time,0) < 0){
										continue;
									}
									$comingupeventswingid = $event['wingid'];
									switch ($comingupeventswingid) {
									 	case 1:
									 		$image = "images/web.jpg";
									 		$wing = "Web Development Wing";
									 		break;
									 	case 2:
									 		$image = "images/coding.jpg";
									 		$wing = "Competitive Coding Wing";
									 		break;
									 	case 3:
									 		$image = "images/app.jpg";
									 		$wing = "App Development Wing";
									 		break;
									 	case 4:
									 		$image  = "images/foss.jpg";
									 		$wing = "Foss Wing";
									 		break;
									 	case 5:
									 		$image = "images/network.jpg";
									 		$wing = "NetWorking Wing";
									 		break;
									 	case 6:
									 		$image = "images/design.jpg";
									 		$wing = "Graphics Wing";
									 		break;
									 	case 7:
									 		$image = "images/tesla.jpg";
									 		$wing = "Tesla Wing";
									 		break;
									 	case 8:
									 		$image = "images/cyber.jpg";
									 		$wing = "Cyber Security Wing";
									 		break;
									} 

								?>
								<div class="col-md-4 portfolio-grids grid grid-mdl">
									<div class="effect1 wow fadeInUp animated" data-wow-delay=".5s">
										<a href=<?php echo $image ?> class="swipebox" title="<?php echo $event['description']?>">
											<img src=<?php echo $image ?> alt=<?php echo $wing?> class="img-responsive" />
											<div class="figcaption">
												<p><?php echo $wing."&nbsp".date('H:i d-m-Y',$to_time);?></p>
											</div>
										</a>	
									</div>
									<?php 
										// if(isset(SESSION[name])){
										?>	
											<a href="updateevent.php?id=<?php echo $event['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
											<a href="destroy.php?id=<?php echo $event['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
										<?php 
										// }
									?>								
									</div>

								<?php
								}

							?>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="tab-1 resp-tab-content">
							<div class="tab_img">
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/design.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/design.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>Design</p>
											</div>
										</a>	
									</div>

								</div>
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/tesla.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/tesla.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>Tesla</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/design.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/design.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>Design</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="tab-1 resp-tab-content">
							<div class="tab_img">
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/foss.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/foss.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>FOSS</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/web.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/web.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>WEB</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/web.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/web.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>WEB</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="tab-1 resp-tab-content">
							<div class="tab_img">
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/app.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/app.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>App</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/design.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/design.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>Design</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="col-md-4 portfolio-grids grid">
									<div class="effect1">
										<a href="images/web.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
											<img src="images/web.jpg" alt="" class="img-responsive" />
											<div class="figcaption">
												<p>Web</p>
											</div>
										</a>	
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--ResponsiveTabs-->
			<!--about-->
			<div class="about">
				<div class="container">
					<h3>About GeekHaven Events</h3>
					<label class="line"></label>
					<img src="images/geekhaven.png" alt=" " />
					<p>GeekHaven organizes many Workshops, Hackathons, Competitions for student community of Indian Institute of Information Technology.</p>
					<p>Web Development, Competitive Coding, Networking, App Development, Tesla, FOSS and Grapics Wing cordially work to make every event grand success and to fulfill underline purpose.</p>
				</div>
			</div>
			<!--//about-->
			<!--skills-->
			<div class="skills">
				<div class="container">
					<h3>Fund Generated</h3>
					<label class="line"></label>
						<div class="col-md-6 skills-left">
							<h4>GeekHaven Society Fund</h4>
							<p>Some workshops are charged of keeping up development of Geekhaven Technical Society and to arrange Hackathons and Competitions.</p>
							<p>Following is details of Funds generated through different events.</p> 	
						</div>
						<div class="col-md-6 skills-right">
							<div class="bar_group">
								<div class='bar_group__bar thin' label='Web Development' show_values='true' tooltip='true' value='3000'></div>
								<div class='bar_group__bar thin' label='NetWorking' show_values='true' tooltip='true' value='2220'></div>
								<div class='bar_group__bar thin' label='App Development' show_values='true' tooltip='true' value='4750'></div>
								<div class='bar_group__bar thin' label='Graphics Wing' show_values='true' tooltip='true' value='2860'></div>
								<div class='bar_group__bar thin' label='Competitive Coding' show_values='true' tooltip='true' value='2500'></div>
								<div class='bar_group__bar thin' label='Tesla' show_values='true' tooltip='true' value='2000'></div>
								<div class='bar_group__bar thin' label='FOSS' show_values='true' tooltip='true' value='2600'></div>
							</div>
							<script src="js/bars.js"></script>
						</div>
						<div class="clearfix"></div>
						
				</div>
			</div>
			<!--/skills-->
		
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});		
			</script>
			<!--//ResponsiveTabs-->
			<!-- swipe box js -->
			<script src="js/jquery.swipebox.min.js"></script> 
				<script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
			</script>
			<!-- //swipe box js -->
		</div>
	</div>
<!--//portfolio-->
 
<!--contact-->
<div class="contact">
	<div class="container">
		<h3>Contact</h3>
		<label class="line"></label>
		<div class="col-md-4 c-w3l">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
			<h4>Indian Institute of Information Technology</h4>
			<h4>Allahabad, India</h4>
		</div>
		<div class="col-md-4 c-w3l c-mail">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<h4><a href="geekhaven@iiita.ac.in">geekhaven@iiita.ac.in</a></h4>
		</div>
		<div class="col-md-4 c-w3l c-phn">
			<i class="fa fa-phone" aria-hidden="true"></i>
			<h4>+918756227275</h4>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--//contact-->


<!--footer-->
<div class="footer-agileinfo">
	<p><a href="https://github.com/BelieveC/GeekhavenEvents"><i class="fa fa-github fa-3x" aria-hidden="true"></i></a></p>
	<p> &copy; 2016 WebD | <a href="geekhaven.iiita.ac.in">Geekhaven</a></p>
	
</div>
<!--//footer-->
<!--common js-->
<script src="https://use.fontawesome.com/9e7e8f20e8.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--//common js-->
</body>
</html>