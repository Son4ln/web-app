<?php 
	include '../views/client/header.php'; 
?>
<!-- DETAIL BLOG -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>Blog</span></h3>
        </div>
        <div class="row">
            <div class="col-sm-2">
			<h3 class="title1">Tin mới nhất</h3>
			<?php
				$objBlog = new Blogs();
				$showBlog = $objBlog->getBlogSlide (0, 3);
				foreach($showBlog as $blog){
			?>
            	<div class="bordered blog-excerpt">
                	<div class="postthumb">
                         <img src="<?php echo '../controller/public/client/images/blog/'.$blog['featured_image']; ?>" alt="<?php echo $blog['blog_title']; ?>" 
									title="<?php echo $blog['blog_title']; ?>" class="b-lazy attachment-blog-preview wp-post-image b-loaded"> 
                    </div>
                    <h5 class="title1"><a href="?action=viewBlog&id=<?php echo $blog['blog_id']; ?>"><?php echo $blog['blog_title']; ?></a></h4>
                </div>
			<?php
				}
			?>
			</div>
			<div class="col-sm-1"></div>
            <div class="col-sm-9">
				<?php
				$getBlog = $objBlog->getBlogById($client_id);
				?>
                <div id="blog-text">
                	<h3 class="title1"><?php echo $blog['blog_title']; ?></h3>
                    <div class="post-div">
                        <p>Posted Date: <?php echo $blog['date_posted']; ?> | By: <?php
							$objUser = new Users();
							$blogUser = $objUser->getUserById($blog['user_id']);
							echo $blogUser['full_name'];
						?></p>
                    </div>
                    <div id="facebook"><iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.aussiehealthproducts.com.au%2Fcolliodal-minerals.php%3Fid%3D75746%26Suttons-Colloidal-Silver-1ltr&amp;layout=standard&amp;show_faces=true&amp;width=200&amp;action=like&amp;colorscheme=light&amp;height=50" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:50px;" class="facebook"></iframe></div>
                    <img src="<?php echo '../controller/public/client/images/blog/'.$blog['featured_image']; ?>" class="b-lazy attachment-blog-preview wp-post-image b-loaded" width="100%">
                    <div class="description"> 
                        <br />
						<p><?php echo nl2br($blog['blog_content']); ?></p>
                    </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- END DETAIL BLOG -->
<?php include '../views/client/footer.php'; ?>