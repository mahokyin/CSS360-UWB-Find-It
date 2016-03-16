<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/controller/ItemController.php');

 if(isset($_GET["uid"])){
       $target_dir = $_SERVER['DOCUMENT_ROOT']."\css360\upload_img\\";
       $controller = new ItemController();
       $var = $_GET["uid"];
       unlink($target_dir.$var.".jpg"); // delete image
       $controller->remove($var);
 } else {
    $msg = "Fatal Error ! Delete failed !"; 
    //header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_signin/Signin.php?err=1&msg=$msg"); /* Redirect browser */
    exit();
 }

?>