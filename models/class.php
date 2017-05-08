<?php
	class productClass {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getClass (){
			$db = new connect();
			$query = "select * from product_class";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getClassById($id) {
			$db = new connect();
			$query = "select * from product_class where class_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addClass ($name){
			$db = new connect();
			$query = "insert into product_class values('','$name')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateClass ($id, $name) {
			$db = new connect();
			$query = "update product_class set class_name = '$name' where class_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delClass ($id){
			$db = new connect();
			$query = "delete from product_class where class_id='$id'";
			$db -> exec($query);
		}
	}
?>