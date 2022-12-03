<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Update Profile : Shah Shop</title>
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
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<?php 

session_start();

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

	if (isset($_SESSION['supplier_id'])) 
	{

	$id=$_SESSION['supplier_id'];
	$result = mysqli_query($conn,"SELECT * FROM supplier_info where id='$id'");
	$row = mysqli_fetch_array($result);
	
	}
	if (isset($_SESSION['USERID'])) 
	{

	$id=$_SESSION['USERID'];
	$result = mysqli_query($conn,"SELECT * FROM registration where USERID='$id'");
	$row = mysqli_fetch_array($result);
	}
	
	if(isset($_POST['Update'])) 
		{

			$first_name=$_POST['first_name'];
			$last_name=$_POST['last_name'];
			$password=$_POST['password'];
			$mail=$_POST['email'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
		
		if(isset($_SESSION['supplier_id']))
		{
			$sql = "UPDATE `supplier_info` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$mail',`password`='$password',`mobile`='$mobile',`address`='$address' WHERE id='$id'";

		}
		else{
			$sql="UPDATE registration SET first_name='$first_name',last_name='$last_name',`password`='$password',email='$mail',mobile='$mobile',`address`='$address' WHERE USERID='$id'";
			
		}
			
			if ($conn->query($sql) === TRUE) {
			  echo '<script>alert("Profile Updated Successfully")</script>';
			  header("Refresh:0,update_profile.php?id=$id");
			} else {
			  echo "Error updating record: " . $conn->error;
			}
			mysqli_close($conn); 
			} 
     
	
 ?>

<body>
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
				
				<!-- cart details -->
				<!--<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="top_shoe_cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>-->
			</div>
		</div>
		<!-- //cart details -->
		
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href=<?php if (isset($_SESSION['USERID']))echo "../user/index.php"; else echo "../supplier/index.php"; ?>>Home</a><i>|</i></li>
					<li>Update Profile</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Update Profile</h3>
			<!-- <p class="head_para">Add Some Description</p> -->
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<!-- <h6>Please fill this form to contact with us.</h6> -->
					<form method="post">
						<!--<div class="col-md-6 col-sm-6 contact_left_grid"> -->
                            <!--<input type="text" name="id" placeholder=" User ID" required=""> -->
							<input type="text" name="first_name" id="first_name" placeholder=" First Name" required pattern="[A-Za-z\s]+" value="<?php echo $row['first_name']; ?>">
                            <br><br>
                            <input type="text" name="last_name" id="last_name" placeholder=" Last Name" required pattern="[A-Za-z\s]+" value="<?php echo $row['last_name']; ?>">
                            <br><br>
							<input type="text" name="password" id="password" placeholder="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="Must contain at least one number and one uppercase and lowercase letter,one special character and at least 8 or maximum 12 characters" required value="<?php echo $row['password']; ?>">
                            <br><br>
							<input type="email" name="email" id="email" placeholder="Email" required="" value="<?php echo $row['email']; ?>">
                            <br><br>
                            <input type="text" name="mobile" id="mobile" placeholder="Telephone" required="" pattern="[0-9]+" minlength="10" maxlength="10" value="<?php echo $row['mobile']; ?>">
                            <br><br>
							
							<textarea name="address" pattern="^[#.0-9a-zA-Z\s,-]+$" id="address" required=""><?php echo $row['address']; ?></textarea>
                            <br>
						<!--onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"-->
						<input type="submit" name="Update" id="Update" value="Update">

						<br><br>
						<!--<input type="reset" value="Clear"> -->
					</form>
				</div>
				
				<div class="clearfix"> </div>

			</div> 

			
		<div class="clearfix"></div>
	</div>
	
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>

			
		</div>
	</div>
	</div>
	<!-- //footer -->

	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>

</html>