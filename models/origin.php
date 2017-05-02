<?php
	class Origin {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getOrigin (){
			$db = new connect();
			$query = "select * from in_origin";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getOriginShowById($id) {
			$db = new connect();
			$query = "select * from in_origin where origin_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addOrigin ($name){
			$db = new connect();
			$query = "insert into in_origin values('','$name')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateOrigin ($id, $name) {
			$db = new connect();
			$query = "update in_origin set name_of_origin = '$name' where origin_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delOrigin ($id){
			$db = new connect();
			$query = "delete from in_origin where origin_id='$id'";
			$db -> exec($query);
		}
	}
?>