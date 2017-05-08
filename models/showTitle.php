<?php
	class ShowTitle {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getShowTitle (){
			$db = new connect();
			$query = "select * from show_title";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getShowTitleById($id) {
			$db = new connect();
			$query = "select * from show_title where show_title_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addShowTitle ($title_id, $product_id){
			$db = new connect();
			$query = "insert into show_title values('','$title_id','$product_id')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateShowTitle ($id, $title_id, $product_id) {
			$db = new connect();
			$query = "update show_title set title_id = '$title_id', product_id = '$product_id' where show_title_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delShowTitle ($id){
			$db = new connect();
			$query = "delete from show_title where show_title_id ='$id'";
			$db -> exec($query);
		}
		
		//đếm số hàng theo title_id trong bảng show_title
		public function countShowTitleById($id){
			$db = new connect();
			$query = "select count('title_id') from show_title where title_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//lấy dữ liệu có trong bảng show_title
		public function getShowTitleNew($id, $from, $to) {
			$db = new connect();
			$query = "select * FROM products JOIN show_title ON products.product_id = show_title.product_id where title_id = '$id' ORDER BY show_title_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
	}
?>