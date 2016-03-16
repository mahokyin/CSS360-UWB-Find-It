<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/model/DB_Functions.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/model/Item.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/model/Operation.php');

class ItemController {
    
    private $model;
    
    function __construct() {
       $this->model = new DB_Functions();
    }

    // destructor
    function __destruct() {
        
    }
    
   public function getItemsCount() {
       return $count = $this->model->getItemsCount();
   }

    public function getItems($begin) {
        return $itemsArray = $this->model->getItems($begin);
        // update in view
        //include ($_SERVER['DOCUMENT_ROOT'].'/CSS360/view/item_lists.php');
    }
    
    public function getSearchItems($terms) {
        return $itemsArray = $this->model->getItems(3,$terms);
        // update in view
        //include ($_SERVER['DOCUMENT_ROOT'].'/CSS360/view/admin_item_lists.php');
    }
    
    public function storeItem($item) {
        $result = $this->model->storeItem($item);
        if ($result->getResult() == true) {
           $msg = $result->getMessage(); 
           header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_homepage/index.php?err=0&msg=$msg"); /* Redirect browser */
           exit();
        }
        else return false;
    }
    
    public function removeAll() {
        $result = $this->model->removeAll();
        // update in view
        if ($result->getResult() == true) {
           $msg = $result->getMessage(); 
           header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_homepage/index.php?err=0&msg=$msg"); /* Redirect browser */
           exit();
        } else {
           $msg = $result->getMessage(); 
           header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_homepage/index.php?err=1&msg=$msg"); /* Redirect browser */
           exit();
        }
    }
    
    public function remove($uid) {
        $result = $this->model->remove($uid);
        // update in view
        if ($result->getResult() == true) {
           $msg = $result->getMessage(); 
           header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_homepage/index.php?err=0&msg=$msg"); /* Redirect browser */
           exit();
        } else {
           $msg = $result->getMessage(); 
           header("Location: http://52.10.11.167/CSS360/public/Admin_view/admin_homepage/index.php?err=1&msg=$msg"); /* Redirect browser */
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