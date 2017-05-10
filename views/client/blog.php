<?php 
	include '../views/client/header.php'; 
?>
<!-- BLOG -->
<section class="section white container auto blog">
    <div class="container">
        <div class="inside-container">
            <div class="section-title">
                <h3 class="title1 fancy"><span>Blog</span></h3>
            </div>
            <div class="row">
				<?php
				$objBlog = new Blogs();
				$countBlog = $objBlog->getCountBlogSlide();
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 6;
				// tổng số trang
				$total_page = ceil($countBlog[0]/ $limit);
				// Giới hạn current_page trong khoảng 1 đến total_page
				if ($current_page > $total_page){
					$current_page = $total_page;
				}
				else if ($current_page < 1){
					$current_page = 1;
				}
				// Tìm Start
				$start = ($current_page - 1) * $limit;
				$showBlog = $objBlog->getBlogSlide ($start, $limit);
				foreach($showBlog as $blog){
				?>
					<div class="col-md-4">
						<div class="bordered blog-excerpt">
							<div class="postthumb">
								<img src="<?php echo '../controller/public/client/images/blog/'.$blog['featured_image']; ?>" alt="<?php echo $blog['blog_title']; ?>" 
									title="<?php echo $blog['blog_title']; ?>" class="b-lazy attachment-blog-preview wp-post-image b-loaded"> 
							</div>
							<h4 class="title1"><a href="?action=viewBlog&id=<?php echo $blog['blog_id']; ?>"><?php echo $blog['blog_title']; ?></a></h4>
							<p><?php echo nl2br($blog['blog_description']); ?></p>
							<a class="btn btn-ghost" href="?action=viewBlog&id=<?php echo $blog['blog_id']; ?>">Read now</a>
						</div>
					</div>
				<?php
				}
				?>
            </div>
            <div id="pages">
            	<p>
				<?php
					// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
					if ($current_page > 1 && $total_page > 1){
						echo '<a href="?action=blog&page='.($current_page-1).'">Prev</a> | ';
					}
					 
					// Lặp khoảng giữa
					for ($i = 1; $i <= $total_page; $i++){
						// Nếu là trang hiện tại thì hiển thị thẻ span
						// ngược lại hiển thị thẻ a
						if ($i == $current_page){
							echo '<span>page '.$i.'</span> | ';
						}
						else{
							echo '<a href="?action=blog&page='.$i.'">page '.$i.'</a> | ';
						}
					}
					 
					// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
					if ($current_page < $total_page && $total_page > 1){
						echo '<a href="?action=blog&page='.($current_page+1).'">Next</a>';
					}
				?>
				</p>
            </div>
        </div>     
    </div>
</section>
<!-- END BLOG -->
<?php include '../views/client/footer.php'; ?>