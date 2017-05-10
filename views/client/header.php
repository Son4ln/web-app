<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> 	<?php $info = new contactInfo();
					$name = $info->getContactInfo();
					foreach ($name as $set){
					echo $set['company_name'];}
				?>
	</title>
	<link rel="stylesheet" href="../controller/public/client/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../controller/public/client/css/style.css">
	<link rel="stylesheet" type="text/css" href="../controller/public/client/css/slide.css">
	<link rel="stylesheet" type="text/css" href="../controller/public/client/css/menu.css">
	<link rel="stylesheet" type="text/css" href="../controller/public/client/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../controller/public/client/css/font-awesome.css">
	<script src="../controller/public/client/js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>
<body>
<!-- HEADER -->
<header id="masthead" class="site-header" role="banner">    
<nav role="navigation" class="navbar navbar-default navbar-fluid" id="primaryNav">
    <div class="container">
        <div class="row on-for-mobile-up">
            <div class="col-md-1 col-xs-6 col-xxxs-12">
            <div class="column">
                <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger"></button>
                        <ul class="dl-menu">
                            <li>
                                <a href="?action=home">Home</a>
                            </li>
                            <li>
                                <a href="?action=about">About</a>
                            </li>
                            <li>
                                <a href="?action=product">Product</a>
                                <ul class="dl-submenu">
								<?php
									$menu = new Categories();
									$showMenuParent = $menu->showMenuParent();
									foreach($showMenuParent as $set){
										if(isset($set['category_name'])){
								?>
										<li>
											<a href="?action=category&id=<?php echo $set['category_id']; ?>"><?php echo $set['category_name']; ?></a>
									<?php	
											$checkMenu = $menu->checkMenuParentChild($set['category_id']);
											if($checkMenu){
												$showMenuChild = $menu->showMenuChild($set['category_id']);
											
									?>
												<ul class="dl-submenu">
													<li><a href="?action=category&id=<?php echo $set['category_id']; ?>">Tất cả sản phẩm</a></li>
									<?php
												foreach($showMenuChild as $result){
									?>
													<li>
														<a href="?action=category&id=<?php echo $result['category_id']; ?>"><?php echo $result['category_name']; ?></a>
											
											<?php	
													$checkMenu1 = $menu->checkMenuParentChild($result['category_id']);
													if($checkMenu1){
														$showMenuChild1 = $menu->showMenuChild($result['category_id']);
													
											?>
														<ul class="dl-submenu">
											<?php
														foreach($showMenuChild1 as $result1){
											?>
															<li>
																<a href="?action=category&id=<?php echo $result1['category_id']; ?>"><?php echo $result1['category_name']; ?></a>
										
											<?php			echo '</li>';
														}
														echo '</ul>';
													}
											?>
											
									<?php			echo '</li>';
												}
												echo '</ul>';
											}
									?>
										
								<?php	echo '</li>';
										}
									} echo '</ul>';
								?>
							</li>
							<li>
                                <a href="?action=blog">Blogs</a>
                            </li>
							<li>
                                <a href="?action=brand">Brands</a>
                            </li>
                            <li>
                                <a href="?action=contact">Contact</a>
                            </li>
                        </ul>
                    </div></div><!-- /dl-menuwrapper -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="../controller/public/client/js/jquery.dlmenu.js"></script>
            <script>
                $(function() {
                    $( '#dl-menu' ).dlmenu();
                });
            </script>
            </div>

            <div class="col-md-2 col-xs-6 col-xxxs-12">
                <a href="" rel="home" class="navbar-brand right">
				<?php $info = new contactInfo();
					$logo = $info->getContactInfo();
					foreach ($logo as $set){
				?>
                    <img class="logo-img" src="<?php echo '../controller/public/client/images/'.$set['logo_image']; ?>" title="">
					<?php }?>
                </a>
            </div>
            <div class="col-md-3">
                <ul class="nav flex-right border contact right">  
                <li class="fancy-li"><span>Contact Us</span></li>
                <li>
                    <span class="text">Vietname contact:</span><a href="">1800 787 904</a>
                </li>
                <li>
                    <span class="text">Australia contact:</span><a href="">1800 787 905</a>
                </li>
            </ul>
            </div>
            <div class="col-md-3">
                <ul class="nav navbar-nav flex-right right search" style="margin-top: 25px">
                <li>                    
                    <form role="search" method="get" class="search-form" action="">
                     <label>
                        <span class="screen-reader-text">Search for:</span>
                         <input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">  
                    </label>
                    <button type="submit" class="search-submit"><span class="fa fa-search"></span></button>
                    </form>                                         
                </li>                
            </ul>
            </div>
            <div class="col-md-3">
                 <ul class="nav navbar-nav flex-right order right" style="margin-top: 15px">
                    <div class="ribbon">
                        <a href="">Order Online <i class="fa fa-shopping-cart"></i></a>
                    </div>
                <li style="width: 100%">
                    <p class="title1"><span>Free Delivery</span> on orders over $500</p>
                </li>
            </ul>
            </div>
        </div>      
        </div>
    </div>
</nav>
    </header>
<!-- END HEADER -->