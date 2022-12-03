<?php
$servername="localhost";
$username="root";
$password="";
$database_name="shop";

$conn = mysqli_connect($servername,$username,$password,$database_name);
// Check connection
$id=$_GET['id'];

if (mysqli_connect_errno())
 {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  
  $sql = "UPDATE `notif_supplier` SET `status` ='approved'  where id=$id";

  

      if (mysqli_query($conn, $sql))
      {
        echo '<script>alert("order is approved")</script>';
        header('location:viewww_reorder_request.php');
      }
      else
      {
          echo "Error: " . $sql."<br>" . mysqli_error($conn);
         
      }
      mysqli_close($conn);
  ?>
