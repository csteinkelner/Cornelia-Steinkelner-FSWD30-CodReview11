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

	$sql = "SELECT * FROM office";
	// $sql = "SELECT name FROM author_interpret";
	// $sql = "SELECT name FROM publisher";
	// $sql = "SELECT type FROM type";
	$result = mysqli_query($conn, $sql);

	include_once 'parts/header_navbar.php'
?>


		

	<div class="container">
		<div class="table-responsive">
			
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Address</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while ($row = mysqli_fetch_assoc($result)) {
							echo 
								" 
								<tr>
									<td scope='row'>".$row["office_id"]."</td>
									<td>".$row["address"]."</td>
								</tr>
								";
						};
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php include_once 'parts/footer.php' ?>
</body>
</html>

<?php ob_end_flush(); ?>