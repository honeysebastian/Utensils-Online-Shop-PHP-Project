<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRoboto" rel="stylesheet">
  <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--<link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">-->
  <title>Cart : Shah Shop</title>
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/backend.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">

  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<?php 
	session_start();
	if(isset($_SESSION['EMAIL']))
	{
		$user_id=$_SESSION['EMAIL'];}
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
 
?>

<body>

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
					<li>Cart</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
<div id="content" style=margin-top:10px; ><!-- content Starts -->
<div class="container" ><!-- container Starts -->



<div class="col-md-9" id="cart" >

<div class="box" >

<form action="cart.php" method="post" enctype="multipart-form-data" >

<h1> Shopping Cart </h1>

	<?php

	$select_cart = "select * from cart where user_id='$user_id'";

	$run_cart = mysqli_query($conn,$select_cart);

	$count = mysqli_num_rows($run_cart); ?>
	<p class="text-muted" style=margin-top:18px; > You currently have <?php echo $count ; ?> item(s) in your cart. </p>


	<?php
	 if($count>0){
		?>
		<div class="table-responsive" >

<table class="table" style=margin-top:10px;>

<thead>

<tr>

<th colspan="2" >Product</th>
<th>Quantity</th>
<th>Unit Price</th>
<th>Sub Total </th>
<th>Delete</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$sum=0; 
while($row_cart = mysqli_fetch_array($run_cart)){
$pro_id = $row_cart['product_id'];
$pro_tittle = $row_cart['product_tittle'];
$pro_count = $row_cart['product_count'];
$pro_price = $row_cart['product_price'];
$pro_image = $row_cart['product_image'];

$prod_total_count_sql="select product_count from products where product_id='$pro_id'";
$row_prod_count = mysqli_query($conn,$prod_total_count_sql);
$result_prod_conut=mysqli_fetch_assoc($row_prod_count);
$prod_total_count=$result_prod_conut['product_count'];

?>

<tr>

<td>

<img src="<?php echo "../admin/product_images/".$pro_image ;?>" >

</td>

<td>

<a href="#" > <?php echo $pro_tittle; ?> </a>

</td>

<td><input type="number" name="quantity" class="quantity" min=1 max=<?php echo $prod_total_count; ?>
				value="<?php echo $pro_count; ?>"
				 data-price='<?php echo $pro_price; ?>'
				 data-code='<?php echo $pro_id; ?>'
				onChange="updatePrice(this)" />
<!--<input type="text" readonly name="quantity" value="<?php echo $pro_count; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control">-->
<?php  
if(isset($prod_total_count)&& $prod_total_count<5){?>
	
	<span class="alert alert-primary" style="color:red">
  only <?php echo $prod_total_count ;?> items left!
</span>
<?php 

}  
?>


</td>

<td>

Rs.<?php echo  $pro_price; ?>.00

</td>

<td id="subtotal">
Rs.<?php  $sum=$sum+multiply($pro_price,$pro_count);  echo multiply($pro_price,$pro_count); ?>.00
</td>

<td>
<a href='cart_remove.php?id=<?php echo $pro_id ?>'>Remove</a>

</td>
</tr>
<?php 

}  
?>

</tbody><!-- tbody Ends -->

<tfoot><!-- tfoot Starts -->

<tr>
  
<th colspan="5"> Total </th>

<th id="total" colspan="2"> Rs.<?php echo $sum; ?>.00 </th>

</tr>

</tfoot><!-- tfoot Ends -->

</table><!-- table Ends -->

<div class="form-inline pull-right">

<!-- <div class="form-group">

<label>Coupon Code : </label>

<input type="text" name="code" class="form-control">

</div> -->

<!-- <input class="btn btn-primary" type="submit" name="apply_coupon" value="Apply Coupon Code" > -->

</div>

</div>
	<?php	
	}

	?>

<div class="box-footer"><!-- box-footer Starts -->

<div class="pull-left"><!-- pull-left Starts -->

<a href="../Homepage/shop.php" class="btn btn-default">

<i class="fa fa-chevron-left"></i> Continue Shopping

</a>

</div><!-- pull-left Ends -->

<?php if(isset($count)&& $count>0){?>
<div class="pull-right">

<!--<button class="btn btn-info" type="submit" name="update" value="Update Cart">
<i class="fa fa-refresh"></i> Update Cart
</button> -->

<a href="<?php echo "../Homepage/checkout.php?total=$sum&count=$count"; ?>" class="btn btn-success">

Proceed to Checkout <i class="fa fa-chevron-right"></i>

</a>

</div><?php }?>

</div><!-- box-footer Ends -->

</form><!-- form Ends -->


</div><!-- box Ends -->

<?php

function update_cart(){
/* 
global $con;

if(isset($_POST['update'])){

foreach($_POST['remove'] as $remove_id){


$delete_product = "delete from cart where p_id='$remove_id'";

$run_delete = mysqli_query($con,$delete_product);

if($run_delete){
echo "<script>window.open('cart.php','_self')</script>";
}
}
}

echo @$up_cart = update_cart(); */
}
?>





</div><!-- col-md-9 Ends -->

<?php if($count>0){ ?>
<div class="col-md-3"><!-- col-md-3 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<h3>Order Summary</h3>

</div><!-- box-header Ends -->

<p class="text-muted">
Shipping and additional costs are calculated based on the values you have entered.
</p>

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table"><!-- table Starts -->

<tbody><!-- tbody Starts -->

<tr>

<td> Order Subtotal </td>

<th> Rs.<?php echo $sum; ?>.00 </th>

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

<th>Rs.<?php echo $sum; ?>.00</th>

</tr>

</tbody>

</table>

</div>

</div>

</div>
<?php	
}

	?>

</div>
</div>


<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>

$(document).ready(function(data){

$(document).on('keyup', '.quantity', function(){

var id = $(this).data("product_id");

var quantity = $(this).val();

if(quantity  != ''){

$.ajax({

url:"change.php",

method:"POST",

data:{id:id, quantity:quantity},

success:function(data){

$("body").load('cart_body.php');

}




});


}




});




});

</script>
<script src="js/minicart.js"></script>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
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
		
		
		function updatePrice(obj) {
			
	var quantity = $(obj).val();
	var price = $(obj).data('price');
	var code = $(obj).data('code');
	
	queryString = 'action=edit&code=' + code + '&quantity=' + quantity+'&price='+price;
	$.ajax({
		type : 'post',
		url : "handle-cart-ep.php",
		data : queryString,
		success : function(data) {
			if(data){
				location.reload();
			}
		}
		
	});
}
	
		

</script>
	</script>
</body>
</html>

<?php 
function multiply($a, $b)
{
    return $a * $b;
  
}

function remove_item($prod_id)
{
   echo "Hello worl";
  
}
 function editCart()
    {
        if (isset($count)&&$count>0) {
            $total_price = 0;
           /*  foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($_POST["code"] == $k) {
                    $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                }
                $total_price = $total_price + ($_POST["quantity"] * $product_price);
            } */
			$total_price = $total_price + ($_POST["quantity"] * $pro_price);
            return $total_price;
        }

        if (! empty($_SESSION["cart_item"]) && is_array($_SESSION["cart_item"])) {
            $this->cartSessionItemCount = count($_SESSION["cart_item"]);
        }
    }

?>
