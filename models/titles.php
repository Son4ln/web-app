<?php
	class Titles {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getTitles (){
			$db = new connect();
			$query = "select * from titles";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getTitleById($id) {
			$db = new connect();
			$query = "select * from titles where title_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addTitle ($name, $icon){
			$db = new connect();
			$query = "insert into titles values('','$name','$icon')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateTitle ($id, $name, $icon) {
			$db = new connect();
			$query = "update titles set title_name = '$name', title_icon = '$icon' where title_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delTitle ($id){
			$db = new connect();
			$query = "delete from titles where title_id ='$id'";
			$db -> exec($query);
		}
	}
?>