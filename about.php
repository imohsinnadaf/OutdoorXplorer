<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE HTML>
<html>

<head>
	<title>OutdoorXplorer - Adventure log</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Tourism Management System In PHP" />
	<script
		type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
</head>

<body>
	<!-- top-header -->
	<div class="top-header">
		<?php include('includes/header.php'); ?>
		<div class="banner-1 " style="min-height: 677px;">
			<div class="container">
				<h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
					style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">OutdoorXplorer</h1>
				<div class="container1
						" style="
						margin-left: 420px;
						font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
						color: black;
						font-weight: 700;
					">
					Welcome to OutdoorXplorer - Your Ultimate Adventure Companion!
					Our innovative database system, OutdoorXplorer, is tailor-made for outdoor enthusiasts seeking to
					capture and cherish their hiking, camping, and travel experiences. We pride ourselves on providing a
					comprehensive platform that allows users to meticulously document every aspect of their adventures.
					At OutdoorXplorer, we understand the importance of reliving the magic of your outdoor escapades. Our
					system empowers you to record detailed information, from specific locations and captivating
					photographs to real-time weather conditions and personal ratings. Whether you're embarking on a
					remote wilderness trek or enjoying a scenic camping trip, OutdoorXplorer offers a structured and
					user-friendly platform to catalog and reminisce about your unforgettable outdoor journeys.
					Join the community of passionate outdoor enthusiasts who trust OutdoorXplorer to enhance their
					adventure documentation experience. Explore the possibilities, share your stories, and create
					lasting memories with OutdoorXplorer - Your partner in outdoor exploration!
				</div>
			</div>
		</div>
		<!--- /privacy ---->
		<!--- footer-top ---->
		<!--- /footer-top ---->
		<?php include('includes/footer.php'); ?>
		<!-- signup -->
		<?php include('includes/signup.php'); ?>
		<!-- //signu -->
		<!-- signin -->
		<?php include('includes/signin.php'); ?>
		<!-- //signin -->
		<!-- write us -->
		<?php include('includes/write-us.php'); ?>
</body>

</html>