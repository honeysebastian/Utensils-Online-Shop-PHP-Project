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
    // $item_id=$_GET['id'];
    $user_id=$_SESSION['EMAIL'];
    $delete_query="delete from cart where user_id='$user_id'";
    $delete_query_result=mysqli_query($conn,$delete_query) or die(mysqli_error($con));
    // echo $user_id; die;

    $delete_query="DELETE FROM `registration` WHERE email='$user_id'";
    $delete_query_result=mysqli_query($conn,$delete_query) or die(mysqli_error($conn));


    // $delete_order="delete from order_details where user_id='$user_id'";
    // $delete_order_result=mysqli_query($conn,$delete_order)or die(mysqli_error($conn));


    echo "<script>window.open('../login/sign_in.php?','_self')</script>";
?>