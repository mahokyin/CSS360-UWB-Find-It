<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/model/DB_Functions.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/helper/Session.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/model/Operation.php');

class LoginController {
    
    private $model;
    private $view;
    
    function __construct() {
       $this->model = new DB_Functions();
    }

    // destructor
    function __destruct() {
        
    }

    public function verifyLogin($username, $password) {
        $result = $this->model->verifyLogin($username, $password);
        if ($result -> getResult()) {
            // call functions in View (not implemented yet)
            Session::init();
            Session::set('login', true); //Need to change later
            header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_homepage/index.php"); /* Redirect browser */
            exit();
        } else {
            $msg = $result->getMessage(); 
            header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_signin/Signin.php?err=1&msg=$msg"); /* Redirect browser */
            exit();
        }
    }

}

/*
// Testing scripts for Controller class
$controller = new ItemController();
$item = new Item();
$item->setName("iPhone 4");
$item->setLocation("UWBB");
$item->setImgPath("dfd");
$item->setDate("2012/12/31");
$item->setTime("12:00:00");
$item->setDes("fgfg");
$status = $controller->storeItem($item);
echo $status;
*/

?>