<?php
switch ($action){
  case "admin":
    include "../views/admin/home.php";
    break;
  case 'brandList':
    include "../views/admin/brand_list.php";
    break;
  case 'brandAdd':
    include "../views/admin/brand_add.php";
    break;
  case 'brandEdit':
    include "../views/admin/brand_edit.php";
    break;
  case 'productList':
    include "../views/admin/product_list.php";
   	break;
  case 'productAdd':
    include "../views/admin/product_add.php";
    break;
  case 'productEdit':
   	include "../views/admin/product_edit.php";
    break;
  case 'userList':
  	include "../views/admin/user_list.php";
  	break;
  case 'userAdd':
  	include "../views/admin/user_add.php";
  	break;
  case 'userEdit':
  	include "../views/admin/user_edit.php";
  	break;
}
?>