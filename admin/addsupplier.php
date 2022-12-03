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
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$mobile=$_POST['phone'];
$address=$_POST['country'];


$sql_query1="INSERT INTO supplier_info (`first_name`,`last_name`,`email`,`password`,`mobile`,`address`)
      VALUES ('$first_name','$last_name','$email','$password','$mobile','$address')";



      if (mysqli_query($conn, $sql_query1))
      {
        header("location:manage_supplier.php");
      }
      else
      {
          echo "Error: " . $sql_query1."<br>" . mysqli_error($conn);
         
      }
      
      
       
       mysqli_close($conn);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Supplier</h4>
                  <p class="card-category">Complete Supplier profile</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" id="first_name" name="first_name" class="form-control" required pattern="[A-Za-z]+">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="last_name" id="last_name"  class="form-control" required pattern="[A-Za-z]+">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" id="password" name="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="Must contain at least one number and one uppercase and lowercase letter,one special character and at least 8 or maximum 12 characters" required >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">phone number</label>
                          <input type="text" id="phone" name="phone" class="form-control" pattern="[0-9]+" minlength="10" maxlength="10" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="textarea" pattern="^[#.0-9a-zA-Z\s,-]+$" name="country" id="country"  class="form-control" required>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Update Supplier</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>