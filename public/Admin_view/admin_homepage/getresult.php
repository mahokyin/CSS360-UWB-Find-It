<?php
include($_SERVER['DOCUMENT_ROOT'].'/CSS360/controller/ItemController.php');
$controller = new ItemController();

$perPage = 10;

$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$itemsArray = $controller->getItems($start);
if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $controller->getItemsCount();
}
$pages  = ceil($_GET["rowcount"]/$perPage);
$output = '';
if(!empty($itemsArray)) {
$output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
include ($_SERVER['DOCUMENT_ROOT'].'/CSS360/public/Admin_view/admin_homepage/admin_item_lists.php');
}
print $output;
?>
