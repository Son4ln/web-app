<?php
	class Blogs
	{

		function __construct()
		{

		}
		//lấy tất cả dữ liệu
		public function getBlogs () {
			$db = new connect();
			$query = "select * from blogs";
			$result = $db -> getList($query);
			return $result;
		}

		//lấy dữ liệu thông qua id
		public function getBlogById ($id) {
			$db = new connect();
			$query = "select * from blogs where blog_id = '$id'";
			$result = $db ->getInstance($query);
			return $result;
		}

		//thêm dữ liệu vào
		public function addBlogs ($title, $imgs, $desc, $content){
			$db = new connect();
			$query = "insert into blogs values('','$title','$imgs','$desc', '$content')";
			$db -> exec($query);
		}

		//cập nhập dữ liệu
		public function updateBlog ($id, $title, $imgs, $desc, $content) {
			$db = new connect();
			$query = "update blogs set blog_title = '$title', featured_image = '$imgs', blog_description = '$desc', blog_content = '$content' where blog_id = '$id'";
			$db -> exec($query);
		}

		//xóa dữ liệu
		public function delBlog ($id) {
			$db = new connect();
			$query = "delete from blogs where blog_id = '$id'";
			$db -> exec($query);
		}

		//lấy giới hạn số hàng dữ liệu từ bảng blogs
		public function getBlogSlide ($from, $to) {
			$db = new connect();
			$query = "select * from blogs ORDER BY blog_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//đếm số tin trong bảng blogs
		public function getCountBlogSlide() {
			$db = new connect();
			$query = "select count(blog_id) from blogs";
			$result = $db -> getInstance($query);
			return $result;
		}


	}
?>