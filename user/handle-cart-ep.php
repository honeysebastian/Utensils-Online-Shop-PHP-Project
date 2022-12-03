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

if (! empty($_POST["action"])) {
    switch ($_POST["action"]) {
       
        case "edit":
		$result= editCart();
		print $result;
            exit;
            break;
      
    }
}


function editCart()
    {
		
        $prod_id=$_POST['code'];
		$prod_count=$_POST['quantity'];
		global $conn;
		 $sql="update cart set product_count='$prod_count' where product_id='$prod_id'";
		  if ($conn->query($sql) === TRUE) {
			  return true;
			  
			} else {
			 return false;
			}
            

    }
	?>