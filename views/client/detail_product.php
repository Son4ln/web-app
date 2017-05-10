<?php 
	include '../views/client/header.php'; 
?>
<!-- DETAIL PRODUCT -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>PRODUCT</span></h3>
        </div>
		<?php
			$objPro = new Products();
			$detailPro = $objPro->getProductById ($client_id);
		?>
        <div class="row">
            <div class="col-sm-5">
            	<div class="col-sm-3">
            		<div class="product-images-small">
                        <div class="box-images-small product-border" style="margin: 0;">
                            <img class="images-small images-opacity images-hover-opacity-off" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image']; ?>" style="width:50%" onclick="currentDiv(1)">
                        </div>
                        <div class="box-images-small product-border">
                          <img class="images-smallmo images-opacity images-hover-opacity-off" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image1']; ?>" style="width:50%" onclick="currentDiv(2)">
                        </div>
                        <div class="box-images-small product-border">
                          <img class="images-small images-opacity images-hover-opacity-off" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image2']; ?>" style="width:50%" onclick="currentDiv(3)">
                        </div>
                    </div>
            	</div>

            	<div class="col-sm-9">
                    <div class="product-images-large product-border">
                        <img class="images-large" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image']; ?>" style="width:50%; height: 50%">
                        <img class="images-large" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image1']; ?>" style="width:50%; height: 50%">
                        <img class="images-large" src="<?php echo '../controller/public/client/images/product/'.$detailPro['product_image2']; ?>" style="width:50%; height: 50%">
                    </div>
            	</div>

                <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }

                function currentDiv(n) {
                  showDivs(slideIndex = n);
                }

                function showDivs(n) {
                  var i;
                  var x = document.getElementsByClassName("images-large");
                  var dots = document.getElementsByClassName("images-small");
                  if (n > x.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = x.length}
                  for (i = 0; i < x.length; i++) {
                     x[i].style.display = "none";
                  }
                  for (i = 0; i < dots.length; i++) {
                     dots[i].className = dots[i].className.replace(" images-opacity-off", "");
                  }
                  x[slideIndex-1].style.display = "block";
                  dots[slideIndex-1].className += " images-opacity-off";
                }
                </script>

            </div>  
            <div class="col-sm-7">
                <div id="product-text">
					<span class="currency" style="display:none">AUD</span>
                    <div class="price-div">
						<div class="rrp">Old Price:
							<?php
								if($detailPro['product_currency']== 'vnđ' || $detailPro['product_currency']== 'đ' || $detailPro['product_currency']== 'vnd' || $detailPro['product_currency']== 'đồng'){
							?>
								<span class="rrp-price"><?php  echo '<span>'.number_format($detailPro['product_price'],2).'</span><span> '.$detailPro['product_currency'].'<span>'; ?>
							<?php
								} else{
							?>
								<span class="rrp-price"><?php  echo '<span>'.$detailPro['product_currency'].number_format($detailPro['product_price'],2).'</span><span> '.'<span>'; 
								}
							?>
                        </div>
						<div class="price">
						<?php
							if($detailPro['product_discount']==0){
								if($detailPro['product_currency']== 'vnđ' || $detailPro['product_currency']== 'đ' || $detailPro['product_currency']== 'vnd' || $detailPro['product_currency']== 'đồng'){
									echo '<span>'.number_format($detailPro['product_price'],2).'</span><span> '.$detailPro['product_currency'].'<span>';
								} else{
									echo '<span>'.$detailPro['product_currency'].number_format($detailPro['product_price'],2).'</span><span> '.'<span>'; 
								}
							}else {
								if($detailPro['product_currency']== 'vnđ' || $detailPro['product_currency']== 'đ' || $detailPro['product_currency']== 'vnd' || $detailPro['product_currency']== 'đồng'){
									echo '<span>'.number_format($detailPro['product_discount'],2).'</span><span> '.$detailPro['product_currency'].'<span>'; 
								} else{
									echo '<span>'.$detailPro['product_currency'].number_format($detailPro['product_discount'],2).'</span><span> '.'<span>';
								}
							}
						?>
                        </div>
                    </div>
                   	<div id="add-to-cart-wrap">
						<form action="" method="post" name="cartform">
                            <fieldset id="add-to-cart">
                                <label for="quantity">Enter Qty</label>
                                	<input class="add-qty" id="quantity" name="add[75746]" type="text" value="1" maxlength="3">
                                <a href="#" class="add-btn" >Add to Cart</a>
	                        </fieldset>
						</form>
						
                    </div>
					<p class="product-links">
						<a class="wishlist" rel="nofollow">Add to <span class="bold">My Wish List</span></a> <span class="divider">|</span>
                        <a rel="nofollow" class="wishlist">Send to a Friend</a>
					</p>
                    <div id="facebook"><iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.aussiehealthproducts.com.au%2Fcolliodal-minerals.php%3Fid%3D75746%26Suttons-Colloidal-Silver-1ltr&amp;layout=standard&amp;show_faces=true&amp;width=200&amp;action=like&amp;colorscheme=light&amp;height=50" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:50px;" class="facebook"></iframe></div>
					<h2 class="bold">Product Description</h2>
                    <div class="description"> 
						<p><?php echo nl2br($detailPro['product_detail'])?></p> 
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
<!-- END DETAIL PRODUCT -->
<?php include '../views/client/footer.php'; ?>