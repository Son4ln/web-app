<?php
	class Maxim {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getMaxim (){
			$db = new connect();
			$query = "select * from maxim";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getMaximById($id) {
			$db = new connect();
			$query = "select * from maxim where maxim_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addMaxim ($content){
			$db = new connect();
			$query = "insert into maxim values('','$content')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateMaxim ($id, $content) {
			$db = new connect();
			$query = "update maxim set maxim_content = '$content' where maxim_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delMaxim ($id){
			$db = new connect();
			$query = "delete from maxim where maxim_id ='$id'";
			$db -> exec($query);
		}
		
		//đếm số hàng trong bảng
		public function countMaxim (){
			$db = new connect();
			$query = "select count('maxim_id') from maxim";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//lấy giới hạn số hàng dữ liệu từ bảng maxim mới
		public function getMaximSlide ($from, $to) {
			$db = new connect();
			$query = "select * from maxim ORDER BY maxim_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy giới hạn số hàng dữ liệu từ bảng maxim cũ
		public function getMaximSlideA ($from, $to) {
			$db = new connect();
			$query = "select * from maxim ORDER BY maxim_id ASC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
	}
?>