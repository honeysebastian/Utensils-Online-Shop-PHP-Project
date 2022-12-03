
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

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$id=$_GET['id'];



/*this is delet quer*/
mysqli_query($conn,"delete from supplier_info where id='$id'")or die("query is incorrect...");
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
                <h4 class="card-title">Manage Supplier</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
        
                      <tr><th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
	                   <th><a href="addsupplier.php" class="btn btn-success">Add New</a></th>
                    </tr></thead>
                    <tbody>
                      <?php 
                       
                       
                       $sql = "SELECT * FROM `supplier_info`";
                       $result = mysqli_query($conn, $sql);

                       if (mysqli_num_rows($result) > 0)
                     {

                       while($row = mysqli_fetch_assoc($result))
						
                       // while(list($USERID,$FIRSTNAME,$LASTNAME,$PASSWORD,$EMAIL,$PHONENUMBER,$ADDRESS)=mysqli_fetch_array($result))
                        {	
                          echo "<tr><td>".$row["first_name"].' '.$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td>";
                          $id=$row["id"];

                          echo"<td>
                          <a href='editsupplier.php?id=$id type='button' rel='torowoltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                  <i class='material-icons'>edit</i>
                                <div class='ripple-container'></div></a>
                          <a href='manage_supplier.php?id=$id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                  <i class='material-icons'>close</i>
                                <div class='ripple-container'></div></a>
                          </td></tr>";
                       //echo "<tr><td>".$row["USERID"]."</td><td>".$row["FIRSTNAME"]."</td><td>".$row["LASTNAME"]."</td><td>".$row["PASSWORD"]."</td><td>".$row["EMAIL"]."</td><td>".$row["PHONENUMBER"]."</td><td>".$row["ADDRESS"]."</td>

                       //</tr>";
                       }
                      }
                       
                                          
                       
                       
                       
                       //$result=mysqli_query($conn,"select id, email, password from supplier_info")or die ("query 2 incorrect.......");

                        //while(list($id,$email,$user_password)=
                        //mysqli_fetch_array($result))
                        // {
                        // echo "<tr><td>$email</td><td>$user_password</td>";

                        // echo"<td>
                        // <a href='edituser.php?user_id=$id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                        //         <i class='material-icons'>edit</i>
                        //       <div class='ripple-container'></div></a>
                        // <a href='manage_supplier.php?user_id=$id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                        //         <i class='material-icons'>close</i>
                        //       <div class='ripple-container'></div></a>
                        // </td></tr>";
                        // }
                        mysqli_close($conn);
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
