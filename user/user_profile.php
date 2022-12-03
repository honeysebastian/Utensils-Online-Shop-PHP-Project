<!DOCTYPE html>
<html lang="en">
<head>
<title>USER PROFILE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

</head>
<?Php
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";

    // Create connection
    $conn= mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 ?>
<body>
<!-- <input type="hidden" readonly value="<?php session_start(); $USERID=$_SESSION['USERID']; echo $USERID; ?>"> -->
<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
			<div class="header_agileits">
				<div class="logo inner_page_log">
					<h1><a class="navbar-brand" href="index.php"><span>Shah</span> <i>Shop</i></a></h1>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

				</div>
			
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				
			</div>
		</div>
			<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					<nav>
						<ul><?php session_start();if(isset($_SESSION['EMAIL'])){$id=$_SESSION['EMAIL'];echo "Email: <input type='text'
						readonly value='$id'>";}else header('Location: ../login/sign_in.php');?>
						
						<li><a href="index.php" class="active">Home</a></li>
							<li><a href="user_profile.php"> View Profile</a></li>
							<li><a href="my_order.php">View order</a></li>
							<li><a href="../Homepage/shop.php">Shop Now</a></li>
							<li><a href="../login/logout.php">Logout</a></li>
							
						</ul>
					</nav>
				</div>
		
		<!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>My profile</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>
	
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Your Profile</h3>
							
				<div class="table-responsive" style=margin-top:20px;>
					<table class="table table-striped">
						<thead>
							 <tr>
							<th>USER ID</th>
							<th>FIRST NAME</th>
							<th>LAST NAME</th>
							<th>EMAIL</th>
							<th>PHONE NUMBER</th>
							<th>ADDRESS</th>
							</tr>
						</thead>
						<tbody>
                        
                        <?php 
						 $result = mysqli_query($conn,"SELECT * FROM registration where USERID=$USERID");
						  while($row = mysqli_fetch_array($result))
							  {
							   echo "<tr>";
								echo "<td>" .$row["USERID"]. "</td>";
								echo "<td>" .$row["first_name"]. "</td>";
								echo "<td>" .$row["last_name"]. "</td>";
								echo "<td>" .$row["email"]. "</td>";
								echo "<td>" .$row["mobile"]. "</td>";
								echo "<td>" .$row["address"]. "</td>";
								echo "</tr>";
							}
						 
                        ?>
                          </tbody>
					</table>
					</div> 
				
			</div>
			<button class="btn btn-warning" type="button"><a href="../pages/update_profile.php?id=<?php echo $USERID ?>">UPDATE</a></button>
			<button class="btn btn-danger"><a href="../pages/delete_profile.php">DELETE</a></button>
			<!-- <button class="btn btn-success"><a href="index.php">HOME</a></button> -->

      
      </div>
	  
    </div>	
	
</body>
</html>


