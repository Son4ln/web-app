<?php
	class Features {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getFeatures (){
			$db = new connect();
			$query = "select * from product_features";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getFeatureById($id) {
			$db = new connect();
			$query = "select * from product_features where feature_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addFeature ($name){
			$db = new connect();
			$query = "insert into product_features values('','$name')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateFeature ($id, $name) {
			$db = new connect();
			$query = "update product_features set feature_name = '$name' where feature_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delFeature ($id){
			$db = new connect();
			$query = "delete from product_features where feature_id ='$id'";
			$db -> exec($query);
		}
	}
?>