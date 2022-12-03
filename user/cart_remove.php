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
    $item_id=$_GET['id'];
    $user_id=$_SESSION['EMAIL'];
    $delete_query="delete from cart where user_id='$user_id' and product_id='$item_id'";
    $delete_query_result=mysqli_query($conn,$delete_query) or die(mysqli_error($con));
    header('location: cart_one.php');
?>