<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/helper/Session.php');
Session::init();
Session::destroy();
header("Location: http://52.10.11.167/CSS360/public/Student_view/student_homepage/index.php"); /* Redirect browser */
exit();

?>