<?php
	class Brands
	{

		function __construct()
		{

		}
		//lấy tất cả dữ liệu từ bảng brands
		public function getBrands () {
			$db = new connect();
			$query = "select * from brands";
			$result = $db -> getList($query);
			return $result;
		}

		//lấy dữ liệu brands thông qua id
		public function getBrandById ($id) {
			$db = new connect();
			$query = "select * from brands where brand_id = '$id'";
			$result = $db ->getInstance($query);
			return $result;
		}

		//thêm dữ liệu vào brands
		public function addBrands ($brandName, $brandImg){
			$db = new connect();
			$query = "insert into brands values('','$brandName','$brandImg')";
			$db -> exec($query);
		}

		//cập nhập dữ liệu
		public function updateBrand ($id, $brandName, $brandImg) {
			$db = new connect();
			$query = "update brands set brand_name = '$brandName', brand_image = '$brandImg' where brand_id = '$id'";
			$db -> exec($query);
		}

		//xóa dữ liệu
		public function delBrand ($id) {
			$db = new connect();
			$query = "delete from brands where brand_id = '$id'";
			$db -> exec($query);
		}

	}
?>