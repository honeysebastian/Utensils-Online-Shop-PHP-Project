<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>View Request-Supplier</title>
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

<body>

<?php
			$servername="localhost";
			$username="root";
			$password="";
			$database_name="shop";

			$conn = mysqli_connect($servername,$username,$password,$database_name);
			if(mysqli_connect_errno())
			{
			  echo"Failed to connect to MySQL" .mysqli_connect_error();
			  exit();
			}
			 
			session_start();
			error_reporting(0);
		

		
?>
	
	<!-- banner -->
	<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
			<div class="header_agileits">
				<div class="logo inner_page_log">
					<h1><a class="navbar-brand" href="index.php"><span>Shah</span> <i>Shop</i></a></h1>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					
				</div>
				
			</div>
		</div>
		
		<!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>view order request</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>View <span>Order Request</span></h3>

				<div class="checkout-right">
					<!-- <h4>Your shopping cart contains: <span>3 Products</span></h4> -->
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>ID</th>
								<th>Product ID</th>
								<!-- <th>Product ID</th> -->
								
								<th>Product Name</th>
                                <th>Quantity</th>
								
								<th>Supplier Email</th>
                                <th>Accept</th> 
								<th>Remove</th> 
                                
							</tr>
						</thead>
						<tbody>
                        
                        <?php 
						$supplier_mail=$_SESSION['supplier_mail'];
						$result=mysqli_query($conn,"select * from  notif_supplier where supplier_email='$supplier_mail'")or die ("query 1 incorrect.......");
						
						while($row = mysqli_fetch_assoc($result))
                        {
                        
								echo "<tr class='rem1'>
                                <td class='invert'>".$row['id']."</td>
								<td class='invert'>".$row['pro_id']."</td> 
							    <td class='invert'>".$row['product_name']."</td> 
								
								<td class='invert'>".$row['required_quantity']."</td>

								<td class='invert'>".$row['supplier_email']."</td>"; ?>
							<?php	
							if($row['status']=='approved')
                                echo "<td class='invert'>ACCEPTED</td>";
							else
                               echo " <td class='invert'><a href=approved_request.php?id=".$row['id']."&required_quantity=".$row['required_quantity']."&pro_id=".$row['pro_id'].">ACCEPT</a></td>";
						   
						   if($row['status']=='rejected')
								echo " <td class='invert'>REJECTED</td>";
							else 	echo " <td class='invert'><a href=reject_request.php?id=".$row['id'].">REJECT</a></td>
							
							</tr> ";
                        }
                        ?>
                            </tbody>
					</table>
				</div> 
						
</html>