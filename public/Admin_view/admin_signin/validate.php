<?php
include($_SERVER['DOCUMENT_ROOT'].'/CSS360/controller/LoginController.php');
$controller = new LoginController();


if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = $controller->verifyLogin($username, $password);
} else {
    echo 'Failed';
}
?>
