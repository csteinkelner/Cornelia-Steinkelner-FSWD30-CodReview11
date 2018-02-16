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

// select all cars with there location
	$allcars = "SELECT * FROM car
				LEFT JOIN cartype ON car.fk_cartype_id = cartype.cartype_id
				LEFT JOIN car_location ON car.fk_location_id = car_location.location_id
				";

	$result = mysqli_query($conn, $allcars);

// select the locations with the coresponding number of cars

	$location = "SELECT * FROM car_location";

	$location_result = mysqli_query($conn, $location);

	$cars1 = "SELECT COUNT(*) FROM `car` WHERE fk_location_id = 1";
	$cars2 = "SELECT COUNT(*) FROM `car` WHERE fk_location_id = 2";
	$cars3 = "SELECT COUNT(*) FROM `car` WHERE fk_location_id = 3";
	$cars4 = "SELECT COUNT(*) FROM `car` WHERE fk_location_id = 4";
	$cars5 = "SELECT COUNT(*) FROM `car` WHERE fk_location_id = 5";
	$cars6 = "SELECT COUNT(*) FROM `car` WHERE fk_location_id = 6";

	$cars1_result = mysqli_query($conn, $cars1);

	include_once 'header_navbar.php'
?>

		

	<div class="container">
		
		<div class="table-responsive">
			
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Model</th>
						<th scope="col">Location</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while ($row = mysqli_fetch_assoc($result)) {
							echo 
								" 
								<tr>
									<td scope='row'>".$row["car_id"]."</td>
									<td>".$row["type"]."</td>
									<td>".$row["location"]."</td>
								</tr>
								";
						};
					?>
				</tbody>
			</table>
		</div>

		<div class="table-responsive">
			
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Location</th>
						<th scope="col">Cars there right now</th>
					</tr>
				</thead>
				<tbody>	
					<tr>
						<td scope='row'><?php $location_result ?></td>
						<td><?php $cars1_result ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<?php ob_end_flush(); ?>