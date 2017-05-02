<?php
	class Certificates {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getCertificates (){
			$db = new connect();
			$query = "select * from certificates";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getCertificateById($id) {
			$db = new connect();
			$query = "select * from certificates where certificate_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addCertificate ($name, $img){
			$db = new connect();
			$query = "insert into certificates values('','$name','$img')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateCertificate ($id, $name, $img) {
			$db = new connect();
			$query = "update certificates set certificate_name = '$name', certificate_image = '$img' where certificate_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delCertificate ($id){
			$db = new connect();
			$query = "delete from certificates where certificate_id ='$id'";
			$db -> exec($query);
		}
	}
?>