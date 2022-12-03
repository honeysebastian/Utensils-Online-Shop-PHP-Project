
  <?php
session_start();

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

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='edit')
{
	$pro_id=$_GET['product_id'];
	$sql = "SELECT * FROM products WHERE product_id='$pro_id'";
	$data=mysqli_query($conn,$sql)or die ("query 1 incorrect.......");
	$result= mysqli_fetch_assoc($data);
	
	 $pathx = "./product_images/";
     $file = $result["product_image"];
	 //mysqli_close($conn);
}

if(isset($_POST['btn_save']))
{
	
			$product_name=$_POST['product_name'];
			$product_category="";
			 if(!empty($_POST['product_category']))
			{
				$product_category = $_POST['product_category'];
			}
			$product_des=$_POST['product_des'];
			$product_price=$_POST['product_price'];
			$product_count=$_POST['product_count'];
			$product_brand=$_POST['product_brand'];
			$rol=$_POST['rol'];

			//picture coding
			$picture_name=$_FILES['picture']['name'];
			$picture_type=$_FILES['picture']['type'];
			$picture_tmp_name=$_FILES['picture']['tmp_name'];
			$picture_size=$_FILES['picture']['size'];
			
			$pic_name=time()."_".$picture_name;
			
	if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='edit')
		
		{
			if(empty($_FILES['picture']['name']))
			{
				//admin updating product with the existing image
				$pic_name = $file;
			}
			else
			{
				//admin changed the image
				$picture_name=$_FILES['picture']['name'];
				$picture_type=$_FILES['picture']['type'];
				$picture_tmp_name=$_FILES['picture']['tmp_name'];
				$picture_size=$_FILES['picture']['size'];
				
				if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif" || $picture_type=="image/webp")
				{
					$pic_name=time()."_".$picture_name;
					move_uploaded_file($picture_tmp_name,"./product_images/".$pic_name);
				}
				
			}
			
			
				$product_id=$_GET['product_id'];
				
				$update_product_query="UPDATE products SET product_cat='$product_category',product_brand='$product_brand',product_title='$product_name',product_price='$product_price',product_desc='$product_des',product_image='$pic_name',rol='$rol',product_count='$product_count' WHERE product_id='$product_id'";
				
				 if ($conn->query($update_product_query) === TRUE)
					{
						
						header("Refresh:0,addproduct.php?success=1&product_id=$product_id&action=edit");
					} 
					else 
					{
						//echo 'Error updating record: ' . $conn->error;
						header("Refresh:0,addproduct.php?failure=1&product_id=$product_id&action=edit");
					} 
				
		}
	else{
		
		
			if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif" || $picture_type=="image/webp")
			{
				if($picture_size<=50000000)
				$product_id=uniqid();
					$pic_name=time()."_".$picture_name;
					move_uploaded_file($picture_tmp_name,"./product_images/".$pic_name);
					$sql="insert into products (product_id,product_cat,product_brand,product_title,product_price, product_desc,product_image,rol,product_count) values ('$product_id','$product_category','$product_brand','$product_name','$product_price','$product_des','$pic_name','$rol','$product_count')";
					
			mysqli_query($conn,$sql) or die ("query incorrect");

			 header("location: sumit_form.php?success=1");
			}
		}


		mysqli_close($conn);
}
include "sidenav.php";
include "topheader.php";

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
		 <?php
if(isset($_GET['success'])){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Product has been updated.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if(isset($_GET['failure'])){
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> Your Product has not been updated.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
		 ?>
		 
	
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                <div class="col-md-12">
                     <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" name="product_name" required class="form-control" value="<?php if(isset($result)) echo $result['product_title']; else echo '';?>">
                      </div>
				</div>
					
				<div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
						<select class="form-control" name="product_category" style="background:black" id="sel1">
       
							<option value ="1">Cookware</option> 
							<option value="2">bakeware</option>
						 </select>
				 		
                      </div>
                </div>
					
					
				<div class="row col-md-12">
					<div class="col-sm">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" <?php if(!isset($result))echo 'required' ?> class="btn btn-fill btn-success" id="picture" >
					</div>
					<div id="preview" class="col-sm">
						<img src="<?php if(isset($result))echo $pathx.$file; else echo'#';?>" id="img" class="rounded img-thumbnail" style="width:150px; height:150px;">
					</div>
					<?php echo '<script type="text/javascript">showDiv()</script>';?>
					
                </div>
                
				<div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="product_des" required name="product_des" class="form-control">
						<?php if(isset($result))echo $result['product_desc']; else echo '';?></textarea>
                      </div>
                </div>
                  
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="product_price" name="product_price" value="<?php if(isset($result)) echo $result['product_price']; else echo '';?>" required class="form-control" >
                    </div>
                </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Other details</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Count</label>
                        <input type="number" id="product_count" name="product_count" required="[1-20]" class="form-control" value="<?php if(isset($result))echo $result['product_count']; else echo'';?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Brand</label>
                        <input type="text" id="product_brand" name="product_brand" required class="form-control" value="<?php if(isset($result)) echo $result['product_brand'];else echo '';?>">
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Reorder Level</label>
                        <input type="number" id="rol" name="rol" required class="form-control" value="<?php if(isset($result)) echo $result['rol']; else echo '';?>">
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#picture").change(function(){
    readURL(this);
});

</script>