<?php
	switch($action)
    {
        case "home":
            include '../views/client/home.php';
            break;
        case "about":
            $action="about";
            include '../views/client/about.php';
            break;
		case "viewProduct":
            $action="viewProduct";
			$client_id = $_GET['id'];
            include '../views/client/detail_product.php';
            break;
		case "blog":
            $action = "blog";
            include '../views/client/blog.php';
            break;
		case "viewBlog":
            $action="viewBlog";
			$client_id = $_GET['id'];
            include '../views/client/detail_blog.php';
            break;
		case "brand":
            $action = "brand";
            include '../views/client/brand.php';
            break;
		case "contact":
            $action = "contact";
            include '../views/client/contact.php';
            break;

		// Product
		case "product":
            $action = "product";
			if(isset($_GET['brand'])){
				$client_brand = $_GET['brand'];
			}
			if(isset($_GET['feature'])){
				$client_feature = $_GET['feature'];
			}
			if(isset($_GET['origin'])){
				$client_origin = $_GET['origin'];
			}
			if(isset($_GET['all'])){
				$all = $_GET['all'];
			}
            include '../views/client/product.php';
            break;
		case "category":
            $action = "category";
			$client_id = $_GET['id'];
            include '../views/client/product.php';
            break;
		case "detailBrandCate":
            $action = "detailBrandCate";
			$client_id = $_GET['id'];
			$client_brand = $_GET['brand'];
			$all = $_GET['all'];
            include '../views/client/product.php';
            break;
		case "detailFeatureCate":
            $action = "detailFeatureCate";
			$client_id = $_GET['id'];
			$client_feature = $_GET['feature'];
			$all = $_GET['all'];
            include '../views/client/product.php';
            break;
		case "detailOriginCate":
            $action = "detailOriginCate";
			$client_id = $_GET['id'];
			$client_origin = $_GET['origin'];
			$all = $_GET['all'];
            include '../views/client/product.php';
            break;

		case "viewAllProduct":
            $action = "viewAllProduct";
			$client_title = $_GET['id'];
			if(isset($_GET['brand'])){
				$client_brand = $_GET['brand'];
			}
			if(isset($_GET['feature'])){
				$client_feature = $_GET['feature'];
			}
			if(isset($_GET['origin'])){
				$client_origin = $_GET['origin'];
			}
			if(isset($_GET['all'])){
				$all = $_GET['all'];
			}
            include '../views/client/product.php';
            break;

	}
?>
