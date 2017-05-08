<?php
include "../models/connect.php";
include "../models/slideShow.php";
include "../models/brands.php";
include "../models/blogs.php";
include "../models/categories.php";
include "../models/certificates.php";
include "../models/features.php";
include "../models/information.php";
include "../models/maxim.php";
include "../models/order.php";
include "../models/origin.php";
include "../models/products.php";
include "../models/showTitle.php";
include "../models/titles.php";
include "../models/users.php";
include "../models/libs.php";
include "../models/group.php";
include "../models/class.php";

//khởi tạo action
if(isset($_GET["action"])){
         $action=$_GET["action"]; }
     elseif (isset($_POST['action']))
     {
         $action=$_POST["action"];
     }
     else{
         $action="home";
     }
     //khơi tạo link hình ảnh user
     $ava_dir='public/images/user-avatar';
     $ava_dir_path=getcwd().DIRECTORY_SEPARATOR.$ava_dir;
     // khởi tạo link banner
     $banner_dir='public/images/banner';
     $banner_dir_path=getcwd().DIRECTORY_SEPARATOR.$banner_dir;

     // khởi tạo link brand
     $brand_dir='public/images/brands';
     $brand_dir_path=getcwd().DIRECTORY_SEPARATOR.$brand_dir;
     //khỏi tạo link ảnh sản phẩm
     $product_dir='public/images/products';
     $product_dir_path=getcwd().DIRECTORY_SEPARATOR.$product_dir;

 //include điều hướng vào đây
    include "../controller/clientController.php";
    include "../controller/adminController.php";




