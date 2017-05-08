<!-- FOOTER -->
<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="socials menu-center">
                    <p>Connect with us</p>
                    <div>
                        <a target="_blank" href=""><img width="24px" height="24px" src="https://uhp.com.au/wp-content/uploads/2015/12/facebook-150x150.png"></a>
                        <a target="_blank" href=""><img width="24px" height="24px" src="https://uhp.com.au/wp-content/uploads/2015/07/instagram.png"></a>
                        <a target="_blank" href=""><img width="24px" height="24px" src="https://uhp.com.au/wp-content/uploads/2015/12/google-150x150.png"></a>
                    </div>
            	</div>
                    <div class="row">
                        <div class="menu-menu-footer-container"><ul id="menu-menu-footer" class=" nav navbar-nav footer menu-center"><li id="menu-item-590" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-590"><a href="?action=home">Home</a></li>
                                <li><a href="?action=about">About Us</a></li>
								<li><a href="?action=product">Products</a></li>
                                <li><a href="?action=blog">Blogs</a></li>
                                <li><a href="?action=brand">Brands</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="?action=contact">Contact Us</a></li>
                    </ul></div></div>
                    <div class="row" style="text-align: center;">
                        <ul class="nav navbar-nav menu-center privacy-menu">
                            <li>
                                <a class="small" href="mainController.php"><?php $info = new contactInfo();
									$name = $info->getContactInfo();
									foreach ($name as $set){
									echo $set['company_name'];}
								?></a>
                            </li>
                            <li>
                                <a class="small" href="#" target="_blank">Design by: NSL</a>
                            </li>
                        </ul>
                        <div class="small">©Unique Health Products 2017</div>
                    </div>
        </div><!-- end container -->
    </div>
</footer>
<!-- END FOOTER -->
<!-- js -->
	<script src="../controller/public/client/js/jquery.min.js"></script>
    <script src="../controller/public/client/js/bootstrap.min.js"></script>
</body>
</html>
