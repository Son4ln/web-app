<?php
include "../models/connect.php";
include "../models/blogs.php";
include "../models/brands.php";
include "../models/categories.php";
include "../models/certificates.php";
include "../models/features.php";
include "../models/information.php";
include "../models/maxim.php";
include "../models/order.php";
include "../models/origin.php";
include "../models/products.php";
include "../models/showTitle.php";
include "../models/slideShow.php";
include "../models/titles.php";
include "../models/users.php";

//khởi tạo action
if(isset($_GET["action"])){
         $action=$_GET["action"]; }
     elseif (isset($_POST['action']))
     {
         $action=$_POST["action"];
     }
     else
         $action="home";

 //include điều hướng vào đây
    include "../controller/clientController.php";
    include "../controller/adminController.php";




