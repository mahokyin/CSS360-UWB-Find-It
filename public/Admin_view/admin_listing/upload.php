<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/controller/ItemController.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/model/Item.php');

$description = $_POST["des"];
$location = $_POST["location"];
$date = $_POST["date"];
$name = $_POST["name"];

//for ($i = 0 && $count = 0; substr($date))

 if(isset($_FILES['image']) && $description && $location && $date && $name){
     
    $target_dir = $_SERVER['DOCUMENT_ROOT']."\css360\upload_img\\";
    
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $tmp = explode('.', $file_name);
    $file_ext = end($tmp);
      
    $expensions= array("jpg");
      
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="extension not allowed, please choose a JPG.";
    }
      
    if(empty($errors)==true){
       $uid = uniqid();
       $root = getcwd();
       $target_file = $target_dir . $uid.'.'.$file_ext;
       
        $temp = explode(".", $file_name);
        $newfilename = $uid . '.' . end($temp);
        move_uploaded_file($file_tmp, $target_dir . $newfilename);
       //move_uploaded_file($file_tmp, $target_file);
       
       
       $item = new Item();
       $item->setName($name);
       $item->setDes($description);
       $item->setLocation($location);
       $item->setDate($date);
       $item->setId($uid);
       
       $imgPath = "http://52.10.11.167/css360/upload_img/".$newfilename;
       $item->setImgPath($imgPath);
       
       $controller = new ItemController();
       $controller->storeItem($item);
       
    }else{
       print_r($errors);
    }
 } else {
    $msg = "Fatal Error ! Insertion failed !"; 
    header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_listing/Listing.php?err=1&msg=$msg"); /* Redirect browser */
    exit();
 }

?>