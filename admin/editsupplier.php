
 <?php
session_start();
include "sidenav.php";
include "topheader.php";


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

$user_id=$_GET["id"];

$sql=mysqli_query($conn,"select first_name,last_name,email,password,mobile,address from supplier_info where id='$user_id'")or die ("query 1 incorrect.......");

$result = mysqli_fetch_assoc($sql);
//list($first_name,$last_name,$email,$user_password,$mobile,$address)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
 $first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$mobile=$_POST['phone'];
$address=$_POST['address'];

//mysqli_query($conn,"update supplier_info set first_name='$first_name', last_name='$last_name', email='$email', user_password='$user_password',phone='$mobile',country='$address' where id='$id'")
//or die("Query 2 is inncorrect..........");

$sql = "UPDATE supplier_info SET first_name='$first_name', last_name='$last_name', email='$email', `password`='$password',mobile='$mobile',`address`='$address' where id='$user_id'";

if ($conn->query($sql) === TRUE) {
  echo '<script>alert("updated Successfully")</script>';
	echo "<script>window.open('manage_supplier.php','_self')</script>";
} else {
  echo "Error updating record: " . $conn->error;
}
mysqli_close($conn); 
}
?> 

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit Supplier</h5>
              </div>
              <form  name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>First name</label>
                        <input type="text" id="first_name" required="[A-Za-z]+" name="first_name"  class="form-control" value="<?php echo $result['first_name']?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Last name</label>
                        <input type="text" id="last_name" required="[A-Za-z]+" name="last_name" class="form-control" value="<?php echo $result['last_name']?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email"  id="email" name="email" class="form-control" value="<?php echo $result['email']?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Password</label>
                        <input type="text" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="Must contain at least one number and one uppercase and lowercase letter,one special character and at least 8 or maximum 12 characters" name="password" id="password" class="form-control" value="<?php echo $result['password'] ?>">
                      </div>
                    </div>

                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Mobile</label>
                        <input type="text" required pattern="[0-9]+" type="text"  minlength="10" maxlength="10" name="phone" id="phone" class="form-control" value="<?php echo $result['mobile'] ?>">
                      </div>
                    </div>

                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Address</label>
                        <input type="textarea"  required pattern="^[#.0-9a-zA-Z\s,-]+$" name="address" id="address" class="form-control" value="<?php echo $result['address'] ?>">
                      </div>
                    </div>

					<div class="card-footer">
					<button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
					</div>
              </div>
              
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>

<script>
$(document).ready( function(){
   $("li").click(function(e){
      // A LI is clicked
      // Set all other li's to not selected
      $("li").removeClass("selected");

      // Add selected class to the clicked li
      $(this).addClass("selected");
  });
});
</script>