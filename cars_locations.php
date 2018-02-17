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
	$location_cars="SELECT car_location.location_id,
				car_location.location,
				COUNT(car.car_id) as nRows 
				FROM car_location 
				LEFT OUTER JOIN car
				ON car_location.location_id = car.fk_location_id
				#WHERE car_location.location_id = 1
				GROUP BY car_location.location_id,
				car_location.location";


	$location_result = mysqli_query($conn, $location_cars);
	

	include_once 'parts/header_navbar.php'
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
						<th scope="col">ID</th>
						<th scope="col">Location</th>
						<th scope="col">Cars there right now</th>
					</tr>
				</thead>
				<tbody>	
					<?php 
						while ($local_row = mysqli_fetch_assoc($location_result)) {
							echo 
								" 
								<tr>
									<td scope='row'>".$local_row["location_id"]."</td>
									<td>".$local_row["location"]."</td>
									<td>".$local_row["nRows"]."</td>
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