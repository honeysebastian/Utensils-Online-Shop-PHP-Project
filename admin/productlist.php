
 
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
 
session_start();
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$sql=mysqli_query($conn,"select product_image from products where product_id='$product_id'")or die ("query 1 incorrect.......");

$result = mysqli_fetch_assoc($sql);

$path="./product_images/".$result['product_image'];

 if(file_exists($path)==true)
{
  unlink($path);
} 
else
{}
/*this is delet query*/
mysqli_query($conn,"delete from products where product_id='$product_id'")or die("query is incorrect...");
}

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Products List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Image</th><th>Name</th><th>Price</th><th>Count</th><th>
						<!--<a class=" btn btn-primary" href="addproduct.php">Add New</a></th></tr></thead> --->
                    <tbody>
                      <?php 

                        $result=mysqli_query($conn,"select product_id,product_image, product_title,product_price,product_count from products")or die ("query 1 incorrect.....");
								
								while($row = mysqli_fetch_assoc($result))
                        {
							
					
                        echo "<tr><td><a href='addproduct.php?product_id=".$row['product_id']."&action=edit'> <img src='./product_images/".$row['product_image']."' style='width:50px; height:50px'; border:groove #000'></a></td><td>".$row['product_title']."</td>
                        <td>".$row['product_price']."</td><td>".$row['product_count']."</td>
                        <td>
                        <a class=' btn btn-success' href='productlist.php?product_id=".$row['product_id']."&action=delete'>Delete</a>
                        </td>";

                      }

                      ?>
						<!-- if($row['product_count']<50 ){
              echo"<td>
						
<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Alert !</strong>  Stock is getting low.
<a href='request.php?product_id=".$row['product_id']."&product_title=".$row['product_title']."'><button class='btn btn-sm btn-outline-primary pull-right'>
              Notify Supplier                     
     </button></a>
  
</div>
                       
                        </td>
						</tr>";} -->
						
					
					
                        
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($conn,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>
<script>$('.alert').alert()</script>
</html>