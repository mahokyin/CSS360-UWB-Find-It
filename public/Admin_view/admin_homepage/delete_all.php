<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/controller/ItemController.php');


$files = glob($_SERVER['DOCUMENT_ROOT'].'/CSS360/upload_img/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
    
$controller = new ItemController();
//unlink($target_dir.$var.".jpg"); // delete image
$controller->removeAll();


?>