<?php
	class Users {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getUsers (){
			$db = new connect();
			$query = "select * from users";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getUserById($id) {
			$db = new connect();
			$query = "select * from users where user_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addUser ($name, $username, $pass, $email, $phone, $address, $avat, $permis){
			$db = new connect();
			$query = "insert into users values('','$name', '$username', '$pass', '$email', '$phone', '$address', '$avat', '$permis')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateUser ($id, $name, $username, $pass, $email, $phone, $address, $avat, $permis) {
			$db = new connect();
			$query = "update users set
				full_name = '$name',
				username = '$username',
				password = '$pass',
				email = '$email',
				phone = '$phone',
				address = '$address',
				avatar = '$avat',
				permission = '$permis'
				where user_id = '$id'";
			$db -> exec($query);
		}
		//update phân quyền.
		public function permission ($id, $permis) {
			$db = new connect();
			$query = "update users set
				permission = '$permis'
				where user_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delUser ($id){
			$db = new connect();
			$query = "delete from users where user_id ='$id'";
			$db -> exec($query);
		}
	}
?>