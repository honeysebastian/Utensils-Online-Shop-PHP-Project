<?php
session_start();
include "sidenav.php";
include "topheader.php";
//include("../db.php");

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

If(isset($_GET['product_id'])){

    $pro_id=$_GET["product_id"];
    $product_title=$_GET["product_title"];
    $sql=mysqli_query($conn,"select product_id, product_title from products where product_id='$pro_id'")or die ("query 1 incorrect.......");
    $result = mysqli_fetch_assoc($sql);
}


if(isset($_POST['btn_save'])) 
{


$required_quantity=$_POST['required_quantity'];
$supplier_email=$_POST['email'];


$sql = "INSERT INTO `notif_supplier`(`pro_id`, `product_name`, `required_quantity`, `supplier_email`) VALUES ('$pro_id','$product_title','$required_quantity','$supplier_email')";

if ($conn->query($sql) === TRUE) {
  echo '<script>alert("Order Submitted Successfully")</script>';
	echo "<script>window.open('rol.php','_self')</script>";
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
                <h5 class="title">Request Order</h5>
              </div>
              <form  name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Product ID</label>
                        <input type="text" name="product_id" id="product_id" class="form-control" value="<?php if(isset($result)) echo $result['product_id']; else echo '';?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <label>Product Name</label>
                        <input type="text" id="product_name" name="product_name"  class="form-control" value="<?php if(isset($result)) echo $result['product_title']; else echo '';?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <label>Required Quantity</label>
                      <input type="text" id="required_quantity" name="required_quantity" class="form-control" value="" required="" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <label >supplier email</label>
                        <select type="email" name="email" id="email" class="form-control" style="background:black" required>
                        <?php 
                         $query=mysqli_query($conn,"select email from supplier_info ")or die ("query 1 incorrect.......");
                        // $result = mysqli_fetch_assoc($query);
						 while($row = mysqli_fetch_assoc($query)){
							  echo '<option value="'.$row['email'].'">'.$row['email'].'</option>';  
						 }
                        ?> 
					
                        </select>
                      </div>
                    </div>

                    

					<div class="card-footer">
					<button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Order</button>
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