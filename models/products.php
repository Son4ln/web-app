<?php
	class Products
	{

		function __construct()
		{

		}
		//lấy tất cả dữ liệu
		public function getProducts () {
			$db = new connect();
			$query = "select * from products";
			$result = $db -> getList($query);
			return $result;
		}

		//lấy dữ liệu thông qua id
		public function getProductById ($id) {
			$db = new connect();
			$query = "select * from products where product_id = '$id'";
			$result = $db ->getInstance($query);
			return $result;
		}

		//thêm dữ liệu vào brands
		public function addProducts ($name, $img, $img1, $img2, $img3, $price, $discount, $desc, $detail, $inStock, $categoriesId, $featureId, $brandId, $originId){
			$db = new connect();
			$query = "insert into products values(
				'', '$name', '$img', '$img1', '$img2', '$img3', '$price', '$discount', '$desc',
				'$detail', '$inStock', '$categoriesId', '$featureId', '$brandId', '$originId'
			)";
			$db -> exec($query);
		}

		//cập nhập dữ liệu
		public function updateProduct ($id, $name, $img, $img1, $img2, $img3, $price, $discount, $desc, $detail, $inStock, $categoriesId, $featureId, $brandId, $originId) {
			$db = new connect();
			$query = "update products set
				product_name = '$name',
				product_image = '$img',
				product_image1 = '$img1',
				product_image2 = '$img1',
				product_image3 = '$img2',
				product_price =  '$price',
				product_discount =  '$discount',
				product_description =  '$desc',
				product_detail = '$detail',
				product_in_stock =  '$inStock',
				category_id =  '$categoriesId',
				feature_id =  '$featureId',
				brand_id =  '$brandId',
				origin_id =  '$originId'
				where product_id = '$id'";
			$db -> exec($query);
		}

		//xóa dữ liệu
		public function delProduct ($id) {
			$db = new connect();
			$query = "delete from products where product_id = '$id'";
			$db -> exec($query);
		}

	}
?>