<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>View Orders : Shah Shop</title>
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
					<h1><a class="navbar-brand" href="../Homepage/index.php"><span>Shah</span> <i>Shop</i></a></h1>
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
					<li><a href="../Homepage/index.php">Home</a><i>|</i></li>
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
				<h3>Your previous Orders</h3>
							
				<div class="table-responsive" style=margin-top:20px;>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Product</th>
                                <th>Quantity</th>
								<th>Amount</th>
								<th>Order ID</th>
								<th>Date</th>
                                
							</tr>
						</thead>
						<tbody>
                        
                        <?php 
						 $user_id=$_SESSION['EMAIL'];
						$result=mysqli_query($conn,"select * from  order_details where user_id='$user_id'")or die ("query 1 incorrect.......");
						
						while($row = mysqli_fetch_assoc($result))
                        {
							$product_id =$row['product_id'];
							$result_image=mysqli_query($conn,"select * from  products where product_id ='$product_id '")or die ("query 1 incorrect.......");
							$product_row = mysqli_fetch_assoc($result_image);
							
							$image=$product_row['product_image'];
                       
					   $order_date = substr($row['order_date'],0,11);
						
								echo "<tr class='rem1'>
								
							    <td class='invert'> <img src='../admin/product_images/".$image."' class=' img img-fluid img-thumbnail' style='width:80px; height:80px'; border:groove #000'> ".$row['product_tittle']."</td> 
								
								<td class='invert'>".$row['product_quantity']."</td>
								<td class='invert'>".$row['product_price']."</td>
								<td class='invert'>".$row['order_id']."</td>
								<td class='invert'>$order_date</td>
							</tr> ";
                        } 
                        ?>
                          </tbody>
					</table>
					</div> 
					
				<div class="pull-left"><!-- pull-left Starts -->

					<a href="../Homepage/shop.php" class="btn btn-success">
					<i class="fa fa-chevron-left"></i> Continue Shopping
					</a>

				</div>
	
				
			</div>

      
      </div>
    </div>		
			
						
</html>