<?php
	class Group {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getGroup (){
			$db = new connect();
			$query = "select * from product_group";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getGroupById($id) {
			$db = new connect();
			$query = "select * from product_group where group_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addGroup ($name, $classId){
			$db = new connect();
			$query = "insert into product_group values('','$name','$classId')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateGroup ($id, $name,$classId) {
			$db = new connect();
			$query = "update product_group set group_name = '$name', class_id = '$classId' where group_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delGroup ($id){
			$db = new connect();
			$query = "delete from product_group where group_id='$id'";
			$db -> exec($query);
		}
	}
?>