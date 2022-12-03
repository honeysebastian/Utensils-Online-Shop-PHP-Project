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
      
      $FIRST_NAME=$_POST['firstname'];
      $LAST_NAME=$_POST['lastname'];
      $PASSWORD=$_POST['password'];
      $EMAIL=$_POST['email'];
      $PHONE_NUMBER=$_POST['phonenumber'];
      $ADDRESS=$_POST['address'];
      
     

      $sql_query1="INSERT INTO registration (`first_name`,`last_name`,`password`,email,`mobile`,`address`)
      VALUES ('$FIRST_NAME','$LAST_NAME','$PASSWORD','$EMAIL','$PHONE_NUMBER','$ADDRESS')";



      if (mysqli_query($conn, $sql_query1))
      {
        header("location:login/sign_in.php");
      }
      else
      {
          echo "Error: " . $sql_query1."<br>" . mysqli_error($conn);
         
      }
      
      
       
       mysqli_close($conn);
  ?>