<?php
	class Categories {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getCategories (){
			$db = new connect();
			$query = "select * from product_categories";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getCategoryById($id) {
			$db = new connect();
			$query = "select * from product_categories where category_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addCategory ($name){
			$db = new connect();
			$query = "insert into product_categories values('','$name')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateCategory ($id, $name) {
			$db = new connect();
			$query = "update product_categories set category_name = '$name' where category_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delCategory ($id){
			$db = new connect();
			$query = "delete from product_categories where category_id='$id'";
			$db -> exec($query);
		}
	}
?>