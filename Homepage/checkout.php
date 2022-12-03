<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Checkout : Shah Shop</title>
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
<?php 
	session_start();
	
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
	
	if(isset($_SESSION['EMAIL']))
		{
		$user_id=$_SESSION['EMAIL'];
		
		$get_details_query="Select * from shipping_details where user_id='$user_id'";
		$result = mysqli_query($conn,$get_details_query) or die(mysqli_error($conn));
		$details=mysqli_fetch_array($result);
		$details_row=mysqli_num_rows($result);
		
		
		
		}
	else 
	header("Location: ../login/sign_in.php");

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
			
			
			if(isset($_GET["total"])&&isset($_GET["count"])){
				$total=$_GET['total'];
				$count=$_GET['count'];
			}
			
			if(isset($_POST['submit']))
			{
				
				$fullName=$_POST['name'];
				$mobile=$_POST['mobile'];
				$landmark=$_POST['landmark'];
				$city=$_POST['city'];
				$addType=$_POST['add_type'];
				
				
				if($details_row==0)
				{
					
				$sql="Insert into shipping_details(user_id,name,mobile,landmark,city,add_type) values('$user_id','$fullName','$mobile','$landmark','$city','$addType')";
					if ($conn->query($sql) === TRUE) 
					{
						//go to payment
						header('location: payment.php');
			  
					} else 
					{
						return false;
					}
				}
				else{
					$update_shiping_details="Update shipping_details set user_id='$user_id',name='$fullName',mobile='$mobile',landmark='$landmark',city='$city',add_type='$addType'";
					if ($conn->query($update_shiping_details) === TRUE) 
					{
						//go to payment
						header('location: payment.php');
			  
					} else 
					{
						return false;
					}
				}
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
				
			</div>
		</div>

		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Check Out</li>
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
				<h3>Chec<span>kout</span></h3>

				<div class="checkout-right">
					<h4>Your shopping cart contains: <span><?php echo $count;?></span></h4>
					<!--<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
							
								<th>Quality</th>
								<th>Product Name</th>
								
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<tr class="rem1">
								<td class="invert">1</td>
								<td class="invert-image"><a href="single.html"><img src="images/s1.jpg" alt=" " class="img-responsive"></a></td>
								
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Bella Toes</td>

								<td class="invert">$675.00</td>
								<td class="invert">
									<div class="rem">
										<div class="close1"> </div>
									</div>

								</td>
							</tr>
							 <tr class="rem2">
								<td class="invert">2</td>
								<td class="invert-image"><a href="single.html"><img src="images/s5.jpg" alt=" " class="img-responsive"></a></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Red Bellies</td>

								<td class="invert">$325.00</td>
								<td class="invert">
									<div class="rem">
										<div class="close2"> </div>
									</div>

								</td>
							</tr>
							<tr class="rem3">
								<td class="invert">3</td>
								<td class="invert-image"><a href="single.html"><img src="images/s2.jpg" alt=" " class="img-responsive"></a></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Chikku Loafers</td>

								<td class="invert">$405.00</td>
								<td class="invert">
									<div class="rem">
										<div class="close3"> </div>
									</div>

								</td>
							</tr> 

						</tbody>
					</table>-->
				</div> 
				<div class="checkout-left">
					<!--<div class="col-md-4 checkout-left-basket" >
						<h4>Your Items in basket</h4>
						<ul >
							<li>Product1  <i>-</i> <span style="margin:auto; display:table;">$675.00</span></li>
							<li>Product2 <i>-</i> <span >$325.00 </span></li>
							<li>Product3 <i>-</i> <span>$405.00 </span></li>
							<li>Total Service Charges <i>-</i> <span>$55.00</span></li>
							<li>Total <i>-</i> <span>$1405.00</span></li>
						</ul>
					</div>-->
					<div class="col-md-3 checkout-left-basket">
						<div class="box" id="order-summary">
							<div class="box-header">
								<h4>Order Summary</h4>
							</div>
								<p class="text-muted">
								Shipping and additional costs are calculated based on the values you have entered.
								</p>
							<div class="table-responsive">
								<table class="table">
									<tbody>
										<tr>
											<td> Order Subtotal </td>
												<th> Rs.<?php echo $total; ?>.00 </th>
										</tr>
										<tr>
											<td> Shipping and handling </td>
												<th>Rs.44.00</th>
										</tr>
										<tr>
											<td>Tax</td>
												<th>Rs.13.00</th>
										</tr>
										<tr class="total">
											<td>Total</td>
												<th>Rs.<?php echo findTotal($total,44,13); ?>.00</th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<div class="col-md-8 address_form">
						<h3>Add a new Details</h3>
						<form  method="post" class="creditly-card-form agileinfo_form needs-validation">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Full name: </label>
											<input class="billing-address-name form-control " value="<?php if(isset($details)) echo $details['name']; ?>" type="text" name="name" pattern="[A-Za-z\s]+"  placeholder="Full name"  required>
										</div>
										<div class="card_number_grids">
											<div class="card_number_grid_left">
												<div class="controls">
													<label class="control-label">Mobile number:</label>
													<input class="form-control" value="<?php if(isset($details)) echo $details['mobile']; ?>" type="text" name="mobile"  placeholder="Mobile number" pattern="[0-9]+" minlength="10" maxlength="10" required>
												</div>
											</div>
											<div class="card_number_grid_right">
												<div class="controls">
													<label class="control-label">Landmark: </label>
													<input class="form-control" value="<?php if(isset($details)) echo $details['landmark']; ?>"  pattern="[A-Za-z0-9'\.\-\s\,]"  type="text" name="landmark" placeholder="Landmark" required>
												</div>
											</div>
											<div class="clear"> </div>
										</div>
										<div class="controls">
											<label class="control-label">Town/City: </label>
											<input class="form-control"  type="text" value="<?php if(isset($details)) echo $details['city']; ?>" pattern="[A-Za-z]+" name="city" placeholder="Town/City" required>
										</div>
										<div class="controls">
											<label class="control-label">Address type: </label>
											<select class="form-control option-w3ls"  name="add_type">
																							<option value="Home" <?php if(isset($details))$details['add_type'] == 'Home' ? ' selected="selected"' : '';?>> Home </option>
																							<option value="Office" <?php if(isset($details))$details['add_type'] == 'Office' ? ' selected="selected"' : '';?>> Office </option>
																							<option value="Commercial"  <?php if(isset($details))$details['add_type'] == 'Commercial' ? ' selected="selected"' : '';?>> Commercial</option>
							
																					</select>
																					
										</div>
									</div>
								
									
									<!--<button class="submit check_out">Delivery to this Address</button>-->
									<div class="checkout-right-basket submit">
							<button class="submit check_out" name="submit" id="submit">Make a Payment</button>
						</div>
								</div>
							</section>
						</form>
						<div class="form-check">
  <input class="form-check-input anim" type="checkbox" id="change" name="change" value="something" onclick="myFunction()"	 >
  <label class="form-check-label">Change Shipping Details</label>
						</div>

					<div class="clearfix"> </div>


					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- //top products
		<div class="mid_slider_w3lsagile">
			<div class="col-md-3 mid_slider_text">
				<h5>Some More Shoes</h5>
			</div>
			<div class="col-md-9 mid_slider_info">
				<div id="myCarousel" class="carousel slide" data-ride="carousel"> -->
					<!-- Indicators -->
					<!--<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class=""></li>
						<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="2" class=""></li>
						<li data-target="#myCarousel" data-slide-to="3" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item active">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g5.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g6.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
					</div> -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
					<!-- The Modal -->

				</div>
			</div>

			<div class="clearfix"> </div>
		</div>
		

			<div class="clearfix"></div>
		</div>
		<!-- //newsletter-->
		<!-- footer -->
		<div class="footer_agileinfo_w3">
			<div class="footer_inner_info_w3ls_agileits">
				<div class="col-md-3 footer-left">
					<h2><a href="index.php"><span>shah</span>shop</a></h2>
					
					<!-- <ul class="social-nav model-3d-0 footer-social social two">
						<li>
							<a href="#" class="facebook">
								<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="#" class="twitter">
								<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="#" class="instagram">
								<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="#" class="pinterest">
								<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							</a>
						</li>
					</ul> -->
				</div>
				<div class="col-md-9 footer-right">
					<div class="sign-grds">
						<div class="col-md-4 sign-gd">
							<h4>Our <span>Information</span> </h4>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</div>

						<div class="col-md-5 sign-gd-two">
							<h4>Store <span>Information</span></h4>
							<div class="address">
								<div class="address-grid">
									<div class="address-left">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</div>
									<div class="address-right">
										<h6>Phone Number</h6>
										<p>+91 9999999999</p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="address-grid">
									<div class="address-left">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
									<div class="address-right">
										<h6>Email Address</h6>
										<p>Email :mail@gmail.com</a></p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="address-grid">
									<div class="address-left">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
									</div>
									<div class="address-right">
										<h6>Location</h6>
										<p>PJ Road, Changanacherry, Kottayam

										</p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 sign-gd flickr-post">
							
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>

				
			</div>
		</div>
	</div>
	<!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
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
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>

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
	
	 <script>
        function myFunction() {
		  // Get the checkbox
		  var checkBox = document.getElementById("change");
		console.log(checkBox.checked);
		  if (checkBox.checked == true){
			console.log(true);
		  } else {
			console.log(false);
		  }
}
    </script>
	
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>

</html>

<?php 
function findTotal($a, $b, $c){
	
	return $a+$b+$c;
}

?>