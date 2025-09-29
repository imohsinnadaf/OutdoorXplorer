<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_GET['search'])) {
	$search = $_GET['search'];
	$sql = "SELECT * FROM tbltourpackages WHERE PackageName LIKE :search";
	$query = $dbh->prepare($sql);
	$query->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
} else {
	$sql = "SELECT * FROM tbltourpackages";
	$query = $dbh->prepare($sql);
}

$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
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
	<style>
		/* Add CSS for the search bar */
		.search-bar {
			text-align: center;
			margin-bottom: 20px;
			
		}

		.search-bar input[type="text"] {
			padding: 6px 12px;
			margin-top: 30px;
			width: 54%;
			height: 34px;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 20px;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		}

		.search-bar button {
			line-height: 1.42857143;
			padding: 6px 18px;
			font-weight: 700;
			color: #fff;
			background-color: #ffd100;
			border: 0;
			font-size: 15px;
			border-radius: 20px;
			transition: all .2s;
			display: inline-block;
		}

		.room-bottom {
			float: left;

		}

		/* Adjust styling as needed */
	</style>
</head>

<body>
	<?php include('includes/header2.php'); ?>
	<!--- banner ---->

	<div class="banner-3" style="min-height: 430px;">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> OutdoorXplorer</h1>
		</div>
	</div>
	<!--- /banner ---->
	<!--- rooms ---->
	<div class="rooms">
		<div class="container">


			<!-- Display filtered packages -->
			<div class="room-bottom">
				<h3>Adventures Awaiting for You</h3>
				<div class="container search-bar">
					<form method="get" action="">
						<input type="text" name="search" placeholder="Search Adventures">
						<button type="submit">Search</button>
					</form>
				</div>

				<?php
				if ($query->rowCount() > 0) {
					foreach ($results as $result) { ?>
						<div class="rom-btm" style="height:14rem;">
							<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
								<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"
								 class="img-responsive" alt="">
							</div>
							<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
								<h4>
									<?php echo htmlentities($result->PackageName); ?>
								</h4>
								<h6>Adventure Type:
									<?php echo htmlentities($result->PackageType); ?>
								</h6>
								<p><b>Adventure Location:</b>
									<?php echo htmlentities($result->PackageLocation); ?>
								</p>
								
							</div>
							<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
								<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>"
									class="view">Details</a>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php }
				} else {
					echo '<p>No packages found.</p>';
				}
				?>
			</div>
		</div>
	</div>
	<!--- /rooms ---->

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
	<!-- //write us -->
</body>

</html>