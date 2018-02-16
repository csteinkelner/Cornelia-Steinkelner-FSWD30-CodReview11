
<!DOCTYPE html>
<html>
<head>
	<title>PHP Car Rental</title>

	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes" rel="stylesheet">
</head>
<body>

	<header id="header" class="">
		<h1>Welcome to our Carrental survice, <?php echo $customerRow['customerName']; ?>!</h1>


	</header><!-- /header -->
	<div class="row">
		<div class="col-md-5 col-lg-4 col-5 col-md-offset-8 col-offset-8">
					
			<ul class="nav nav-pills">
				<li><a href="home.php">Home</a></li>
				<li><a href="cars_list.php">Cars</a></li>
				<li><a href="office_list.php">Offices</a></li>
				<li>
					<button class="btn">
						<a href="logout.php?logout">Sign Out</a>
					</button>
				</li>

	  		</ul>
	  	</div>
	</div>