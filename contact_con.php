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
      
      $name=$_POST['name'];
      $phn=$_POST['phn'];
      $email=$_POST['email'];
      $subject=$_POST['subject'];
      $message=$_POST['msg'];
      
      
     

      $sql_query1="INSERT INTO contact (`name`,`phn`,`email`,`subject`,`message`)
      VALUES ('$name','$phn','$email','$subject','$message')";



      if (mysqli_query($conn, $sql_query1))
      {
        header("location:Homepage/contact.html");
      }
      else
      {
          echo "Error: " . $sql_query1."<br>" . mysqli_error($conn);
         
      }
      
      
       
       mysqli_close($conn);
  ?>