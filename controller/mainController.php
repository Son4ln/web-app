<?php
include "../models/connect.php";
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



