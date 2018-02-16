<?php  
	ob_start();
	session_start();

	require_once 'db_connection.php';

	// // if session is not set this will redirect to login page
	// if( !isset($_SESSION['customer']) ) {
	// 	header("Location: index.php");
	// 	exit;
	// }

	$res=mysqli_query($conn, "SELECT * FROM customer WHERE customerId=".$_SESSION['customer']);

	$customerRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

	$sql = "SELECT * FROM car";
	// $sql = "SELECT name FROM author_interpret";
	// $sql = "SELECT name FROM publisher";
	// $sql = "SELECT type FROM type";
	$result = mysqli_query($conn, $sql);

	include_once 'header_navbar.php'
?>
<div id="hero">
	<div class="row">
			<div class="col-md-4 col-lg-4 col-4">
				<div class="box">
					<img src="img/rent.jpg">
					<h3>easy rental!</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-4">
				<div class="box">
					<img src="img/rent2.jpg" id="special">
					<h3>get to see more!</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-4">
				<div class="box">
					<img src="img/rent3.jpg">
					<h3>Fun with the whole family!</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				</div>
			</div>
		</div>
</div>
	<!-- <div class="container">
		<div class="row">
			<div class="col-4">
				<img src="img/rent.jpg">
			</div>
			<div class="col-4">
				<img src="img/rent2.jpg">
			</div>
			<div class="col-4">
				<img src="img/rent3.jpg">
			</div>
		</div>
	</div> -->
	<?php include_once 'footer.php' ?>
</body>
</html>

<?php ob_end_flush(); ?>