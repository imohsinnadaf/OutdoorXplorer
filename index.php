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
	<!--//end-animate-->
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="banner">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> OutdoorXplorer</h1>
				
		</div>
	</div>


	<!---holiday---->
	<div class="container">
		<div class="holiday">
			<h3>Adventures Awaiting for You</h3>
			<?php $sql = "SELECT * from tbltourpackages order by rand() limit 4";
			$query = $dbh->prepare($sql);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $result) { ?>
					<div class="rom-btm">
						<br>
						<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
							<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"
								class="img-responsive" alt="">
						</div>
						<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
							<h4>
								<?php echo htmlentities($result->PackageName); ?>
							</h4>
							<h6>Adventure Type :
								<?php echo htmlentities($result->PackageType); ?>
							</h6>
							<p><b>Adventure Location :</b>
								<?php echo htmlentities($result->PackageLocation); ?>
							</p>
							<p><b>Features</b>
								<?php echo htmlentities($result->PackageFetures); ?>
							</p>
						</div>
						<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
							
							<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>"
								class="view">Details</a>
						</div>
						<div class="clearfix"></div>
					</div>

				<?php }
			} ?>
<br><br><br>
			<center><div><a href="#" data-toggle="modal" data-target="#myModal4" class="view">View More Packages</a></div></center>
		</div>
		<div class="clearfix"></div>
	</div>

	<?php include('includes/footer.php'); ?>
	<!-- signup -->
	<?php include('includes/signup.php'); ?>
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php'); ?>
	<!-- //signin -->
	<!-- write us -->
	<?php include('includes/write-us.php'); ?>
	<!-- //write us -->
</body>

</html>