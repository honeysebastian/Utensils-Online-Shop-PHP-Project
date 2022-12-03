<?php

session_start();
include("../includes/db.php");

?>

<?php

if(isset($_SESSION['EMAIL'])){

$user_id=$_SESSION['EMAIL'];

}


$select_cart = "select * from cart where user_id='$user_id'";

$run_cart = mysqli_query($conn,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['product_id'];
$pro_title = $row_cart['product_tittle'];
$pro_price = $row_cart['product_price'];
$pro_qty = $row_cart['product_count'];
$status = "pending";
$order_id = mt_rand();

$sub_total = $pro_price*$pro_qty;


$insert_customer_order = "insert into order_details (product_id,product_tittle,product_price,user_id,product_quantity,order_id,order_date) values ('$pro_id','$pro_title','$sub_total','$user_id','$pro_qty','$order_id',NOW())";

$run_customer_order = mysqli_query($conn,$insert_customer_order);

$delete_cart = "delete from cart where user_id='$user_id'";

$run_delete = mysqli_query($conn,$delete_cart);

$old_count_query="select product_count from products where product_id='$pro_id' LIMIT 1";
$old_count_reult = mysqli_query($conn,$old_count_query);
if ($old_count_reult !== false) {
    $row = mysqli_fetch_assoc($old_count_reult);
	$old_count=$row['product_count'];
}
$new_count=$old_count - $pro_qty;

$reduce_count="UPDATE `products` SET `product_count`='$new_count' WHERE product_id='$pro_id'";

$update_count=mysqli_query($conn,$reduce_count);

echo "<script>alert('Your order has been submitted,Thanks ')</script>";

echo "<script>window.open('shop.php?','_self')</script>";


}

?>