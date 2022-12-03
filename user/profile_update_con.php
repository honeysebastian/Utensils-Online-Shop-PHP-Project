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

    if(isset($_POST['update']))
    {
        $EMAIL = $_POST['EMAIL'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        

        $query = "UPDATE registration SET FIRSTNAME='".$firstname."',LASTNAME='".$lastname."',PHONENUMBER='".$phonenumber."',ADDRESS='".$address."' WHERE EMAIL='".$EMAIL."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            echo"Profile updated succesfully";
            header("location:userhomepage/index.html");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        echo"unsuccess";
    } 