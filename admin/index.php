
    <?php
session_start();
// include("../db.php");

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
          $hostname="localhost"; //local server name default localhost
          $username="root";  //mysql username default is root.
          $password="";       //blank if no password is set for mysql.
          $database="shop";  //database name which you created
          
          $con=mysqli_connect($hostname,$username,$password,$database);
          
          if(! $con)
          {
          die('Connection Failed'.(mysqli_error($conn)));
          }



            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";


            }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Users List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Password</th><th>Email</th><th>Contact</th><th>Address</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        // $result=mysqli_query($con,"select * from registration")or die ("query 1 incorrect.....");
                        // $result=

                        $sql = "SELECT * FROM `registration`";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0)
                      {

                        while($row = mysqli_fetch_assoc($result))

                        // while(list($USERID,$FIRSTNAME,$LASTNAME,$PASSWORD,$EMAIL,$PHONENUMBER,$ADDRESS)=mysqli_fetch_array($result))
                        // {	
                        echo "<tr><td>".$row["USERID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["password"]."</td><td>".$row["email"]."</td><td>".$row["mobile"]."</td><td>".$row["address"]."</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>


          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Contact Us List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Name</th><th>Contact</th><th>Email</th><th>Subject</th><th>Message</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        // $result=mysqli_query($con,"select * from registration")or die ("query 1 incorrect.....");
                        // $result=

                        $sql = "SELECT * FROM `contact`";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0)
                      {

                        while($row = mysqli_fetch_assoc($result))

                        // while(list($USERID,$FIRSTNAME,$LASTNAME,$PASSWORD,$EMAIL,$PHONENUMBER,$ADDRESS)=mysqli_fetch_array($result))
                        // {	
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["phn"]."</td><td>".$row["email"]."</td><td>".$row["subject"]."</td><td>".$row["message"]."</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           <!--<div class="row">
            <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Categories List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Categories</th><th>Count</th>
                    </tr></thead>
                    <tbody> -->
                    //<?php 
                        //$result=mysqli_query($con,"select * from categories")or die ("query 1 incorrect.....");
                       // $i=1;
                       // while(list($cat_id,$cat_title)=mysqli_fetch_array($result))
                       // {	
                          //$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
                           // $query = mysqli_query($con,$sql);
                           // $row = mysqli_fetch_array($query);
                            //$count=$row["count_items"];
                           // $i++;
                        //echo "<tr><td>$cat_id</td><td>$cat_title</td><td>$count</td>

                        //</tr>";
                
                      // ?> 
                    <!-- </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Brands List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Brands</th><th>Count</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        // $result=mysqli_query($con,"select * from brands")or die ("query 1 incorrect.....");
                        // $i=1;
                        // while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        // {	
                            
                        //     $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
                        //     $query = mysqli_query($con,$sql);
                        //     $row = mysqli_fetch_array($query);
                        //     $count=$row["count_items"];
                        //     $i++;
                        // echo "<tr><td>$brand_id</td><td>$brand_title</td><td>$count</td>

                        // </tr>";
                        // }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           </div>
           <div class="col-md-5">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Subscribers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>email</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        // $result=mysqli_query($con,"select * from email_info")or die ("query 1 incorrect.....");

                        // while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        // {	
                        // echo "<tr><td>$brand_id</td><td>$brand_title</td>

                        // </tr>";
                        // }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           
            
          
        </div>
      </div>
      <?php 
include "footer.php";
?>