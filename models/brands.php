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

		//đếm số hàng trong bảng products
		public function countBrand (){
			$db = new connect();
			$query = "select count('brand_id') from brands";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy giới hạn số hàng dữ liệu từ bảng brands
		public function getBrandSlide ($from, $to) {
			$db = new connect();
			$query = "select products.brand_id, brand_name, brand_image, count('brand_id') as count_brand from brands JOIN products ON brands.brand_id=products.brand_id group by products.brand_id ORDER BY count_brand DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}


	}
?>