<?php 
	include '../views/client/header.php'; 
	include '../views/client/banner.php';
?>
  <!-- BRANDS -->
	<section class="section white our-brands" style="height: auto;">
		<div class="container">
			<div class="inside-container">
				<div class="section-title">
					<h3 class="title1 fancy"><span>Meet Our</span></h3>
					<h3 class="title3">Brands</h3>
				</div>
				<?php $pro = new Products();
					$count_product = $pro->countProduct();
					if(isset($count_product[0])){
				?>
				<div class="section-content">
					<p>We specialise in your favourite natural health staples and the latest trending products from Australia and around the world.</p>
					<div class="row on-for-mobile-up">
						<div class="row">        
							<div class="row on-for-mobile-up">
								<?php $brand = new Brands();
									$brands = $brand->getBrandSlide(0,4);
									foreach ($brands as $set){
								?>
										<div class="col-sm-3 col-xs-6 col-xxxs-12"><img class="aligncenter size-full wp-image-194" src="<?php echo '../controller/public/client/images/brand/'.$set['brand_image']; ?>" alt="" width="187" height="184" sizes="(max-width: 187px) 100vw, 187px"><p></p>
											<div>
												<p><?php echo $set['brand_name']; ?></p>
											</div>
										</div>
								<?php
									}
								?>
							</div>
						  </div> 
					</div> 
					<p><img class="alignnone size-full wp-image-2195 on-for-mobile-down-only brands-mobile-img" style="margin-bottom: 1em;"></p>
				</div>
				<span class="callout down">See our awesome range</span>
				<a href="" class="btn btn-ghost" title="Click here">Click here</a>
				<?php 
					}else{
				?>
				<div class="section-content">
					<p>We specialise in your favourite natural health staples and the latest trending products from Australia and around the world.</p>
				</div>	
				<?php
					}
				?>
			</div>
		</div>
	</section>
	<!-- END BRAND -->
	<!-- PRODUCT -->
	<?php $pro = new Products();
		$count_product = $pro->countProduct();
		if(isset($count_product[0])){
	?>
	<section class="white products">
		<div class="container">
			<?php
				$pro = new Products();
				$count_product = $pro->countProduct();
				$count_product_dis = $pro->countProductDiscount();
				if(isset($count_product[0])){

				$title = new Titles();
				$titles = $title->getTitles();
				foreach ($titles as $set){
					if($set['show_hide']==0){
						
					}else{
						$slide = $set['title_id'];
			?>
			<div class="category-header-wapper">
				<h2 class="category-title pull-left">
					<a href="">
					<i class="hd hd-khuyen-mai-hot"></i><?php echo $set['title_name']; ?>
					</a>
				</h2>
				<ul class="pull-right">
					<li><a href="?action=viewAllProduct&id=<?php echo $set['title_id']; ?>">Xem tất cả</a></li>
				</ul>
				<div class="clearfix"></div>        
			</div>
			<!-- SP -->
			
			<?php
				if($set['title_name']=='Sản phẩm bán chạy'){
			?>
			<div class="container"> 
			 <div class="row"> 
			   <div id="myCarousel<?php echo $slide; ?>" class="carousel slide" data-interval="false">
				<div class="carousel-inner">
				<?php
					$or = new Order();
					$ct_or = $or->getCountOrderProduct();
					if($ct_or[0]>= 9){
						$dem = 3;
					}else if($ct_or[0]>= 5){
						$dem = 2;
					}else{
						$dem = 1;
					}
					for($i=0; $i<$dem;$i++){
				?>
					<div class="item<?php if($i==0){ echo ' active';} ?>"> 
						<div class="row"> 
				<?php
						$ct_buy = $i*4;
						$buy = $or->getOrderProduct($ct_buy,4);
						foreach ($buy as $set){
				?>
						<div class="col-md-3"> 
							<div class="product-warp-box">
								<div class="feature-image">
									<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1">
									<img src="<?php echo '../controller/public/client/images/product/'.$set['product_image']; ?>" alt="<?php echo $set['product_name']; ?>">
									</a>
									</div>
									<div class="feature-title">
										<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1"><?php echo $set['product_name']; ?></a>
									</div>
									<div class="feature-price">
									<?php
										if($set['product_currency']== 'vnđ' || $set['product_currency']== 'đ' || $set['product_currency']== 'vnd' || $set['product_currency']== 'đồng'){
											if($set['product_discount']!=0){
									?>
												<span class="new-price left"><?php  echo number_format($set['product_discount'],2).' '.$set['product_currency']; ?></span>
												<span class="old-price right"><?php echo number_format($set['product_price'],2).' '.$set['product_currency']; ?></span>
										<?php
											}else{
										?>
												<center><span class="new-price"><?php echo number_format($set['product_price'],2).' '.$set['product_currency']; ?></span></center>
									<?php 	} 
										}
										else{
											if($set['product_discount']!=0){
									?>
												<span class="new-price left"><?php  echo $set['product_currency'].' '.number_format($set['product_discount'],2); ?></span>
												<span class="old-price right"><?php echo $set['product_currency'].' '.number_format($set['product_price'],2); ?></span>
										<?php
											}else{
										?>
												<center><span class="new-price"><?php echo $set['product_currency'].' '.number_format($set['product_price'],2); ?></span></center>
									<?php
											} 
										}
									?>
										<div class="clear"></div>
									</div>
							</div>     
						</div>	
				<?php
						}
				?>
						</div> 
					</div>
				
				<?php }
				?>  
				</div> 
				<a class="left carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
				<a class="right carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a> 
			   </div> 
			 </div>
			</div>
			<!-- end -->	
			<?php
				}else if($set['title_name']=='Sản phẩm mới nhất'){
			?>
			<div class="container"> 
			 <div class="row"> 
			   <div id="myCarousel<?php echo $slide; ?>" class="carousel slide" data-interval="false">
				<div class="carousel-inner">
				<?php
					if($count_product[0]>= 9){
						$dem = 3;
					}else if($count_product[0]>= 5){
						$dem = 2;
					}else{
						$dem = 1;
					}
					for($i=0; $i<$dem;$i++){
				?>
					<div class="item<?php if($i==0){ echo ' active';} ?>"> 
						<div class="row"> 
				<?php
						$ct_pro = $i*4;
						$new = $pro->getProductNew($ct_pro,4);
						foreach ($new as $set){
				?>
						<div class="col-md-3"> 
							<div class="product-warp-box">
								<div class="feature-image">
									<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1">
									<img src="<?php echo '../controller/public/client/images/product/'.$set['product_image']; ?>" alt="<?php echo $set['product_name']; ?>" title="<?php echo $set['product_name']; ?>">
									</a>
									</div>
									<div class="feature-title">
										<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1"><?php echo $set['product_name']; ?></a>
									</div>
									<div class="feature-price">
									<?php
										if($set['product_currency']== 'vnđ' || $set['product_currency']== 'đ' || $set['product_currency']== 'vnd' || $set['product_currency']== 'đồng'){
											if($set['product_discount']!=0){
									?>
												<span class="new-price left"><?php  echo number_format($set['product_discount'],2).' '.$set['product_currency']; ?></span>
												<span class="old-price right"><?php echo number_format($set['product_price'],2).' '.$set['product_currency']; ?></span>
										<?php
											}else{
										?>
												<center><span class="new-price"><?php echo number_format($set['product_price'],2).' '.$set['product_currency']; ?></span></center>
									<?php 	} 
										}
										else{
											if($set['product_discount']!=0){
									?>
												<span class="new-price left"><?php  echo $set['product_currency'].' '.number_format($set['product_discount'],2); ?></span>
												<span class="old-price right"><?php echo $set['product_currency'].' '.number_format($set['product_price'],2); ?></span>
										<?php
											}else{
										?>
												<center><span class="new-price"><?php echo $set['product_currency'].' '.number_format($set['product_price'],2); ?></span></center>
									<?php
											} 
										}
									?>
										<div class="clear"></div>
									</div>
							</div>     
						</div>	
				<?php
						}
				?>
						</div> 
					</div>
				
				<?php }
				?>  
				</div> 
				<a class="left carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
				<a class="right carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a> 
			   </div> 
			 </div>
			</div>
			<!-- end -->
			<?php		}else if($set['title_name']=='Sản phẩm On Sale'){
			?>
			<div class="container"> 
			 <div class="row"> 
			   <div id="myCarousel<?php echo $slide; ?>" class="carousel slide" data-interval="false">
				<div class="carousel-inner">
				<?php
					
					if($count_product_dis[0]>= 9){
						$dem = 3;
					}else if($count_product_dis[0]>= 5){
						$dem = 2;
					}else{
						$dem = 1;
					}
					for($i=0; $i<$dem;$i++){
				?>
					<div class="item<?php if($i==0){ echo ' active';} ?>"> 
						<div class="row"> 
				<?php
						$ct_pro = $i*4;
						$sale = $pro->getProductDiscountDESC($ct_pro,4);
						foreach ($sale as $set){
				?>
						<div class="col-md-3"> 
							<div class="product-warp-box">
								<div class="feature-image">
									<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1">
									<img src="<?php echo '../controller/public/client/images/product/'.$set['product_image']; ?>" alt="<?php echo $set['product_name']; ?>" title="<?php echo $set['product_name']; ?>">
									</a>
									</div>
									<div class="feature-title">
										<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1"><?php echo $set['product_name']; ?></a>
									</div>
									<div class="feature-price">
									<?php
										if($set['product_currency']== 'vnđ' || $set['product_currency']== 'đ' || $set['product_currency']== 'vnd' || $set['product_currency']== 'đồng'){
									?>
										<span class="new-price left"><?php  echo number_format($set['product_discount'],2).' '.$set['product_currency']; ?></span>
										<span class="old-price right"><?php echo number_format($set['product_price'],2).' '.$set['product_currency']; ?></span>
									<?php }
										else{
									?>
										<span class="new-price left"><?php  echo $set['product_currency'].' '.number_format($set['product_discount'],2); ?></span>
										<span class="old-price right"><?php echo $set['product_currency'].' '.number_format($set['product_price'],2); ?></span>
									<?php
										}
									?>
										<div class="clear"></div>
									</div>
							</div>     
						</div>	
				<?php
						}
				?>
						</div> 
					</div>
				
				<?php }
				?>  
				</div> 
				<a class="left carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
				<a class="right carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a> 
			   </div> 
			 </div>
			</div>
			<!-- end -->
			<?php
						}else{
			?>
			<div class="container"> 
			 <div class="row"> 
			   <div id="myCarousel<?php echo $slide; ?>" class="carousel slide" data-interval="false">
				<div class="carousel-inner">
				<?php
					$show_title = new ShowTitle();
					$count_show_title = $show_title->countShowTitleById($slide);
					if($count_show_title[0]>= 9){
						$dem = 3;
					}else if($count_show_title[0]>= 5){
						$dem = 2;
					}else{
						$dem = 1;
					}
					for($i=0; $i<$dem;$i++){
				?>
					<div class="item<?php if($i==0){ echo ' active';} ?>"> 
						<div class="row"> 
				<?php
						$ct_tt = $i*4;
						$s_title = $show_title->getShowTitleNew($slide,$ct_tt,4);
						foreach ($s_title as $set){
				?>
						<div class="col-md-3"> 
							<div class="product-warp-box">
								<div class="feature-image">
									<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1">
									<img src="<?php echo '../controller/public/client/images/product/'.$set['product_image']; ?>" alt="<?php echo $set['product_name']; ?>" title="<?php echo $set['product_name']; ?>">
									</a>
									</div>
									<div class="feature-title">
										<a href="?action=viewProduct&id=<?php echo $set['product_id']; ?>" tabindex="-1"><?php echo $set['product_name']; ?></a>
									</div>
									<div class="feature-price">
									<?php
										if($set['product_discount']!=0){
									?>
										<span class="new-price left"><?php echo number_format($set['product_discount'],2); ?> đ</span>
										<span class="old-price right"><?php echo number_format($set['product_price'],2); ?> đ</span>
									<?php
										}else{
									?>
										<center><span class="new-price"><?php echo number_format($set['product_price'],2); ?> đ</span></center>
									<?php } ?>
										<div class="clear"></div>
									</div>
							</div>     
						</div>	
				<?php
						}
				?>
						</div> 
					</div>
				
				<?php }
				?>  
				</div> 
				<a class="left carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
				<a class="right carousel-control" href="#myCarousel<?php echo $slide; ?>" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a> 
			   </div> 
			 </div>
			</div>
			<!-- end -->
			<?php
						}
					}
				}}else{}
			?>
		</div>
	</section>  
	<?php }
	?>	
	<!-- END PRODUCT -->
	
	
	
	<!-- BLOG -->
	<section class="section white container auto blog">
		<div class="container">
			<div class="inside-container">
				<div class="section-title">
					<h3 class="title1 fancy"><span>Featured On The</span></h3>
					<h3 class="title3">Blog</h3>
				</div>
				<ul class="list-none list-unstyled">
				<?php $blog = new Blogs();
					$blogs = $blog->getBlogSlide(0,3);
					foreach ($blogs as $set){
				?>
					<li class="col-sm-4">
						<div class="bordered blog-excerpt">
							<div class="postthumb">
								<img src="<?php echo '../controller/public/client/images/blog/'.$set['featured_image']; ?>" class="b-lazy attachment-blog-preview wp-post-image b-loaded"> 
							</div>
							<h4 class="title1"><a href=""><?php echo $set['blog_title']; ?></a></h4>
							<a class="btn btn-ghost" href="">Read now</a>
						</div>
					</li>
					<?php }
					?>
				</ul>
				
				<div class="section-content">
					<p style="margin-bottom: 1em;">Find out about new products, seasonal essentials and industry insights.</p>
					<a href="/blog" class="btn btn-ghost" title="View All">View All</a>
				</div>
			</div>
		</div>
	</section>
	<!-- END BLOG -->

	<section class="white testimonials">
		<div class="container">
			<div class="row">
				<div id="mymaxim" class="carousel slide" data-interval="false"> 
					<div class="carousel-inner"> 
						<?php $maxim = new Maxim();
						$count_maxim = $maxim->countMaxim();
						if($count_maxim[0]%3 == 0){
							$dem = $count_maxim[0]/3;
							for($i=0; $i<$dem;$i++){
						?>
							<div class="item<?php if($i==0){ echo ' active';} ?>">
							<?php
								$fr = $i*3;
								$mx = $maxim->getMaximSlide($fr,3);
								foreach ($mx as $set){
							?>
								<div class="col-sm-4">
									<div class="box-tn">
										<div class="<?php echo $set['maxim_background'];?>">
											<p class="txt-tn"><?php echo $set['maxim_content'] ;?></p>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						<?php } }
						else if($count_maxim[0]>3){
							$dem = ceil($count_maxim[0]/3);
							for($i=0; $i<$dem;$i++){
						?>
							<div class="item<?php if($i==0){ echo ' active';} ?>"> 
							<?php
								if($i== $dem-1){
									$fr = $count_maxim[0]-3;
									$mx = $maxim->getMaximSlide($fr,3);
								}else{
								$fr = $i*3;
								$mx = $maxim->getMaximSlide($fr,3);
								}
								foreach ($mx as $set){
							?>
								<div class="col-sm-4">
									<div class="box-tn">
										<div class="<?php echo $set['maxim_background'];?>">
											<p class="txt-tn"><?php echo $set['maxim_content'] ;?></p>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						<?php } }
						else{
							?>
							<div class="item active"> 
							<?php
								$mx = $maxim->getMaxim();
								foreach ($mx as $set){
							?>
								<div class="col-sm-4">
									<div class="box-tn">
										<div class="<?php echo $set['maxim_background'];?>">
											<p class="txt-tn"><?php echo $set['maxim_content'] ;?></p>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						<?php }
						?>
					</div>
					<a class="left carousel-control" href="#mymaxim" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a> 
					<a class="right carousel-control" href="#mymaxim" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- LINK -->
	<section class="white instagram" style="margin-left:0px; margin-right:0px;">
		<div class="row no-gutters">
			<a class="col-sm-2" rel="group1" href="" target="_blank"><img class="b-lazy b-loaded" src="../controller/public/client/images/ins/1.jpg" ></a>
			<a class="col-sm-2" rel="group1" href="" target="_blank"><img class="b-lazy b-loaded" src="../controller/public/client/images/ins/2.jpg" ></a>                 
			<div class="col-sm-4" style="text-align: center;">
				<div>
					<h3 class="title3 insta-title">Meet Us On</h3>
					<a class="btn btn-ghost" href="">Instagram &gt;</a>
				</div>
			</div>
			<a class="col-sm-2" rel="group1" href="" target="_blank"><img class="b-lazy b-loaded" src="../controller/public/client/images/ins/3.jpg"></a><a class="col-sm-2" rel="group1" href="" target="_blank"><img class="b-lazy b-loaded" src="../controller/public/client/images/ins/4.jpg"></a>
		</div>
	</section>
	<!-- END LINK -->
<?php include '../views/client/footer.php'; ?>