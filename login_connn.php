<?php
	session_start();

	$conn=mysqli_connect("localhost", "root", "", "shop");

	if(!$conn){
		die("Error: Failed to connect to database!");
	}

		$EMAIL = $_POST['email'];
		$PASSWORD = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM `registration` WHERE `email`='$EMAIL' && `password`='$PASSWORD'") or die(mysqli_error($conn));
		$user_result=mysqli_fetch_array($query);
		$user=mysqli_num_rows($query);

		$query1=mysqli_query($conn,"select * from `admin` where `EMAIL`='$EMAIL' && `PASSWORD`='$PASSWORD'") or die(mysqli_error($conn));
		$admin_result=mysqli_fetch_array($query1);
		$admin=mysqli_num_rows($query1);



		$query2 = mysqli_query($conn, "SELECT * FROM `supplier_info` WHERE `email`='$EMAIL' && `password`='$PASSWORD'");
		$supplier_result=mysqli_fetch_array($query2);
		$supplier=mysqli_num_rows($query2);



		if($admin > 0){
			$email=$admin_result['EAMIL'];
			$PASSWORD=$admin_result['PASSWORD'];
			$_SESSION['admin_id'] = $email;

            header('Location:admin/index.php');
          
		}
		elseif ( $supplier > 0)    {


			$email=$supplier_result['email'];
			$password=$supplier_result['password'];
			$_SESSION['supplier_mail'] = $email;
			$_SESSION['supplier_id'] = $supplier_result['id'];

			 header('Location:supplier/index.php');
		}

		else {

		    if($user > 0){
			$_SESSION['USERID']=$user_result['USERID'];
			$_SESSION['EMAIL']=$user_result['email'];
			
			if(isset($_SESSION['itemId_cache'])){
				header('Location:Homepage/single.php');
			}
			else{
				
            header('Location:Homepage/shop.php');
			}
          
		}

		    else{
			$_SESSION['tmp']="Invalid username or password!";

		    echo '<script>alert("Invalid Password or Email entered..!")</script>';
			header('Location:login/sign_in.php?error=1');
		  }
		}
	
?>
