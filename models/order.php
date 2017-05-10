<?php
	class Order{
		
		function __construct()
		{

		}
		//đếm số hàng sản phẩm bán chạy
		public function getCountOrderProduct() {
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số hàng sản phẩm bán chạy theo brand_id
		public function getCountOrderProductB ($brand_id){
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details where product_id in (select product_id from products where brand_id = '$brand_id')";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số hàng sản phẩm bán chạy theo origin_id
		public function getCountOrderProductF ($feature_id){
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details where product_id in (select product_id from products where feature_id = '$feature_id')";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số hàng sản phẩm bán chạy theo origin_id
		public function getCountOrderProductO ($origin_id){
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details where product_id in (select product_id from products  where origin_id = '$origin_id')";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm bán chạy
		public function getOrderProduct($from, $to) {
			$db = new connect();
			$query = "select products.product_id,product_name,product_image,order_details.product_price,order_details.product_discount,product_currency, sum(order_quantity) as sum_quantity
			from products JOIN order_details ON products.product_id = order_details.product_id group by product_id ORDER BY sum_quantity DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		//Brand - Selling Product
		//đếm số lượng sản phẩm theo từng thương hiệu trong bảng products
		public function countOrderBrandById ($brand_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where brand_id = '$brand_id' and product_id in (select product_id from order_details group by product_id)";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng tính năng trong bảng products
		public function countOrderFeatureById ($feature_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where feature_id = '$feature_id' and product_id in (select product_id from order_details group by product_id)";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng nguồn gốc trong bảng products
		public function countOrderOriginById ($origin_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where origin_id = '$origin_id' and product_id in (select product_id from order_details group by product_id)";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng thương hiệu trong bảng products
		public function getOrderBrand () {
			$db = new connect();
			$query = "select * from  products INNER JOIN order_details ON order_details.product_id = products.product_id INNER JOIN brands ON brands.brand_id = products.brand_id group by products.brand_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng tính năng trong bảng products
		public function getOrderFeature () {
			$db = new connect();
			$query = "select * from  products INNER JOIN order_details ON order_details.product_id = products.product_id INNER JOIN product_features ON product_features.feature_id = products.feature_id group by products.feature_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng nguồn gốc trong bảng products
		public function getOrderOrigin () {
			$db = new connect();
			$query = "select * from  products INNER JOIN order_details ON order_details.product_id = products.product_id INNER JOIN in_origin ON in_origin.origin_id = products.origin_id group by products.origin_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//SHOW PRODUCT SELECTED FROM ORDER_DETAILS
		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details
		public function getProductOrderLimit ($from, $to){
			$db = new connect();
			$query = "select * from  products where product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details theo brand_id
		public function getProductOrderLimitB ($brand_id, $from, $to){
			$db = new connect();
			$query = "select * from  products where brand_id = $brand_id and product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details theo feature_id
		public function getProductOrderLimitF ($feature_id, $from, $to){
			$db = new connect();
			$query = "select * from  products where feature_id = $feature_id and product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details theo origin_id
		public function getProductOrderLimitO ($origin_id, $from, $to){
			$db = new connect();
			$query = "select * from  products where origin_id = $origin_id and product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
	}
?>
