<?php
    session_start();
	unset($_SESSION['EAMIL']);
	unset($_SESSION['PASSWORD']);
  	unset($_SESSION['USERID']);
  	unset($_SESSION['EMAIL']);
	unset($_SESSION['itemId_cache']);
	unset($_SESSION['email']);
	unset($_SESSION['user_password']);
	unset($_SESSION['supplier_id']);
	unset($_SESSION['supplier_mail']);
  	header('Location:../login/sign_in.php');
?>