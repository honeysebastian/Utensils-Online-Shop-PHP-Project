
    <?php
session_start();

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="panel-body">
		<a>
            <?php  //success message
          //  session_start();
          $hostname="localhost"; 
          $username="root";  
          $password="";       
          $database="shop";  
          
          $con=mysqli_connect($hostname,$username,$password,$database);
          
          if(! $con)
          {
          die('Connection Failed'.(mysqli_error($conn)));
          }



            // if(isset($_POST['success'])) {
            // $success = $_POST["success"];
            // echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";


            // }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Users Order List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>PRODUCT ID</th><th>USER EMAIL</th><th>QUANTITY</th><th>AMOUNT</th><th>ORDER ID</th><th>DATE</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                       

                        $sql = "SELECT * FROM `order_details`";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0)
                      {

                        while($row = mysqli_fetch_assoc($result))

                        	
                        echo "<tr><td>".$row["product_id"]."</td><td>".$row["user_id"]."</td><td>".$row["product_quantity"]."</td><td>".$row["product_price"]."</td><td>".$row["order_id"]."</td><td>".$row["order_date"]."</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>


<?php 
include "footer.php";
?>