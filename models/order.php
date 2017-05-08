<?php
	class Order{
		
		function __construct()
		{

		}
		//lấy dữ liệu sản phẩm bán chạy
		public function getCountOrderProduct() {
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details";
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
	}
?>
