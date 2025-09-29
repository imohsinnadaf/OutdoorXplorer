<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Function to get reviews for a package
function getReviews($dbh, $pid)
{
	$sql = "SELECT * FROM reviews WHERE PackageId=:pid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_OBJ);
}

// Function to log activity
function logActivity($dbh, $user_id, $activity_type, $activity_description)
{
	$sql = "INSERT INTO `activity_log` (`user_id`, `activity_type`, `activity_description`) 
            VALUES (:user_id, :activity_type, :activity_description)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$query->bindParam(':activity_type', $activity_type, PDO::PARAM_STR);
	$query->bindParam(':activity_description', $activity_description, PDO::PARAM_STR);
	$query->execute();
}

// Process booking submission
if (isset($_POST['submit2'])) {
	$pid = intval($_GET['pkgid']);
	$useremail = $_SESSION['login'];
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$comment = $_POST['comment'];
	$status = 0;

	$sql = "INSERT INTO tblvisited(PackageId,UserEmail,status) VALUES(:pid,:useremail,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();

	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$msg = "Record Saved";

		// Log the booking activity
		$activity_type = 'Booking';
		$activity_description = 'Visited By User: ' . $useremail;
		logActivity($dbh, $_SESSION['user_id'], $activity_type, $activity_description);
	} else {
		$error = "Something went wrong. Please try again";
	}
}

// Process review submission
if (isset($_POST['submitReview'])) {
	$pid = intval($_GET['pkgid']);
	$useremail = $_SESSION['login'];
	$comment = $_POST['comment'];

	$sql = "INSERT INTO reviews(PackageId, UserEmail, Comment) VALUES(:pid, :useremail, :comment)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->bindParam(':comment', $comment, PDO::PARAM_STR);

	if ($query->execute()) {
		echo "<div class='succWrap'><strong>Success</strong>: Review submitted successfully.</div>";

		// Log the review activity
		$activity_type = 'Review';
		$activity_description = 'Submitted a review by User: ' . $useremail;
		logActivity($dbh, $_SESSION['user_id'], $activity_type, $activity_description);
	} else {
		echo "<div class='errorWrap'><strong>Error</strong>: Something went wrong. Please try again.</div>";
	}
}
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
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		new WOW().init();
	</script>
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
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

		/* Styles for the reviews section */
		.reviews-section {
			margin-top: 20px;
			padding: 15px;
			border: 1px solid #ccc;
			border-radius: 5px;

		}

		.reviews-section h3 {
			font-size: 30px;
			font-weight: 600;
			margin-bottom: 10px;
			text-align: center;
			color: ;
		}

		.reviews-section p {
			margin-bottom: 5px;
		}

		/* Styles for the review form */
		.review-form {
			margin-top: 20px;
			padding: 15px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		.review-form label {
			display: block;
			margin-bottom: 5px;
		}

		.review-form textarea {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			resize: vertical;
		}

		.review-form button {
			padding: 8px 15px;
			background-color: #337ab7;
			color: #fff;
			border: none;
			border-radius: 3px;
			cursor: pointer;
		}

		.review-form button:hover {
			background-color: #286090;
		}

		/* Add these styles for the Recent Activity Log */
		.recent-activity-section {
			margin-top: 20px;
			padding: 15px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		.recent-activity-section h2 {
			font-size: 24px;
			font-weight: 600;
			margin-bottom: 10px;
			color: #333;
		}

		.activity-log-container {
			margin-top: 10px;
		}

		.activity-log-list {
			list-style-type: none;
			padding: 0;
		}

		.activity-log-list li {
			padding: 8px;
			margin-bottom: 8px;
			background-color: #f9f9f9;
			border-radius: 3px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.activity-log-list li .timestamp {
			color: #999;
			font-size: 12px;
		}
	</style>
</head>

<body>
	<!-- top-header -->
	<?php include('includes/header.php'); ?>
	<div class="banner-3">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> OutdoorXplorer</h1>
		</div>
	</div>
	<!--- /banner ---->
	<!--- selectroom ---->
	<div class="selectroom">
		<div class="container">
			<?php if ($error) { ?>
				<div class="errorWrap"><strong>ERROR</strong>:
					<?php echo htmlentities($error); ?>
				</div>
			<?php } else if ($msg) { ?>
					<div class="succWrap"><strong>SUCCESS</strong>:
					<?php echo htmlentities($msg); ?>
					</div>
			<?php } ?>
			<?php
			$pid = intval($_GET['pkgid']);
			$sql = "SELECT * from tbltourpackages where PackageId=:pid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':pid', $pid, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $result) { ?>

					<form name="book" method="post">
						<div class="selectroom_top">
							<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
								<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"
									class="img-responsive" alt="">
							</div>
							<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
								<h2>
									<?php echo htmlentities($result->PackageName); ?>
								</h2><br>
								<p><b>Adventure Type :</b>
									<?php echo htmlentities($result->PackageType); ?>
								</p>
								<p><b>Adventure Location :</b>
									<?php echo htmlentities($result->PackageLocation); ?>
								</p>
								<p><b>Features :</b>
									<?php echo htmlentities($result->PackageFetures); ?>
								</p><br>
								<p><b>Adventure Details :</b>
									<?php echo htmlentities($result->PackageDetails); ?>
								</p>
								<br><br>
							</div>
							<br><br>
							<ul>
								<?php if ($_SESSION['login']) { ?>

									<li class="spe" align="center">

										<button type="submit" name="submit2" class="btn-primary btn">Already Visited</button>
									</li>
								<?php } else { ?>

								<?php } ?>
								<div class="clearfix"></div>
							</ul>
						</div>

					</form>

				<?php }
			} ?>
			<br><br>
			<!-- Add this section to display reviews -->
			<div class="reviews-section" style="box-shadow: 13px 10px 43px -8px #6f6f6f; border-radius:20px;">
				<h3>Reviews</h3>
				<?php
				// Fetch and display reviews
				$pid = intval($_GET['pkgid']);
				$reviews = getReviews($dbh, $pid);

				if ($_SESSION['login']) {
					echo "<div class='reviews-section'>";
					//echo "<h3>Reviews</h3>";
				
					if ($reviews) {
						foreach ($reviews as $review) {
							echo "<p><strong>{$review->UserEmail}</strong>: {$review->Comment}</p>";
						}
					} else {
						echo "<p>No reviews yet.</p>";
					}

					echo "</div>";
				} else {
					//echo "<p>Login to submit a review.</p>";
					if ($reviews) {
						foreach ($reviews as $review) {
							echo "<p><strong>{$review->UserEmail}</strong>: {$review->Comment}</p>";
						}
					} else {
						echo "<p>No reviews yet.</p>";
					}
				}
				?>
			</div>

			<!-- Add this section to submit reviews -->
			<?php if ($_SESSION['login']) { ?>
				<div class="add-review-section">
					<br><br>
					<br><br>
					<div class='reviews-section' style="box-shadow: 13px 10px 43px -8px #6f6f6f; border-radius:20px;">
						<h3>Add Your Review</h3>
						<form name="addReview" method="post" class="review-form">
							<label for="comment">Comment:</label>
							<textarea name="comment" id="comment" rows="4" cols="40" required></textarea>
							<br><br>
							<input type="submit" name="submitReview" value="Submit Review" class="btn-primary btn">
						</form>
					</div>
				</div>
			<?php } else { ?>
				<p>Please <a href="#signinModal" data-toggle="modal" data-target="#signinModal">login</a> to leave a review.
				</p>
			<?php } ?>
			<br><br>
			<div class="recent-activity-section" style="box-shadow: 13px 10px 43px -8px #6f6f6f; border-radius:20px;">
				<br>
				<h2>Recent Activity Log</h2><br>
				<div class="activity-log-container">
					<?php
					$sql = "SELECT * FROM `activity_log` ORDER BY `timestamp` DESC LIMIT 10";
					$query = $dbh->prepare($sql);
					$query->execute();
					$activityLog = $query->fetchAll(PDO::FETCH_OBJ);

					echo '<ul class="activity-log-list">';
					foreach ($activityLog as $log) {
						echo '<li>' . $log->activity_description . ' - <span class="timestamp">' . $log->timestamp . '</span></li>';
					}
					echo '</ul>';
					?>
				</div>
			</div>

			<br><br>

			<center><a href="index.php" class="view">Back</a></center>
		</div>
	</div>
	<!--- /selectroom ---->
	<<!--- /footer-top ---->
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