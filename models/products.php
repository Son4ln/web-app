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
		public function addProducts ($name, $img, $img1, $img2, $price, $discount, $currency, $desc, $detail, $inStock, $categoriesId, $featureId, $brandId, $originId, $userId){
			$db = new connect();
			$query = "insert into products values(
				'', '$name', '$img', '$img1', '$img2', '$price', '$discount', '$currency', '$desc',
				'$detail', '$inStock', '$categoriesId', '$featureId', '$brandId', '$originId', '$userId'
			)";
			$db -> exec($query);
		}

		//cập nhập dữ liệu
		public function updateProduct ($id, $name, $img, $img1, $img2, $price, $discount, $currency, $desc, $detail, $inStock, $categoriesId, $featureId, $brandId, $originId, $userId) {
			$db = new connect();
			$query = "update products set
				product_name = '$name',
				product_image = '$img',
				product_image1 = '$img1',
				product_image2 = '$img2',
				product_price =  '$price',
				product_discount =  '$discount',
				product_currency = '$currency',
				product_description =  '$desc',
				product_detail = '$detail',
				product_in_stock =  '$inStock',
				category_id =  '$categoriesId',
				feature_id =  '$featureId',
				brand_id =  '$brandId',
				origin_id =  '$originId',
				user_id =  '$userId'
				where product_id = '$id'";
			$db -> exec($query);
		}

		//xóa dữ liệu
		public function delProduct ($id) {
			$db = new connect();
			$query = "delete from products where product_id = '$id'";
			$db -> exec($query);
		}

// HOMEPAGE
		//đếm số hàng trong bảng products
		public function countProduct (){
			$db = new connect();
			$query = "select count(product_id) from products";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy dữ liệu mới nhất trong bảng products
		public function getProductNew ($from, $to) {
			$db = new connect();
			$query = "select * from products ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu mới nhất trong bảng products
		public function getProductNewB ($brand_id, $from, $to) {
			$db = new connect();
			$query = "select * from products where brand_id = '$brand_id' ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu mới nhất trong bảng products
		public function getProductNewF ($feature_id, $from, $to) {
			$db = new connect();
			$query = "select * from products where feature_id = '$feature_id' ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu mới nhất trong bảng products
		public function getProductNewO ($origin_id, $from, $to) {
			$db = new connect();
			$query = "select * from products where origin_id = '$origin_id' ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//lấy dữ liệu mới nhất có giá thấp - tăng dần trong bảng products
		public function getProductNewDESC ($from, $to) {
			$db = new connect();
			$query = "select * from products ORDER BY product_id DESC ORDER BY product_price DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//lấy dữ liệu có giá giảm trong bảng products
		public function getProductDiscount ($from, $to) {
			$db = new connect();
			$query = "select * from products where product_discount not like 0 ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số hàng giảm giá trong bảng products
		public function countProductDiscount (){
			$db = new connect();
			$query = "select count('product_id') from products where product_discount not like 0";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy dữ liệu có giảm giá nhiều nhất - giảm dần trong bảng products
		public function getProductDiscountDESC ($from, $to) {
			$db = new connect();
			$query = "select *,(product_price - product_discount)as dis from products where product_discount not like 0 ORDER BY dis DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu có giảm giá trong bảng products theo brand_id
		public function getProductDiscountB ($brand_id, $from, $to) {
			$db = new connect();
			$query = "select * from products where brand_id = '$brand_id' and product_discount not like 0 ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu có giảm giá trong bảng products theo feature_id
		public function getProductDiscountF ($feature_id, $from, $to) {
			$db = new connect();
			$query = "select * from products where feature_id = '$feature_id' and product_discount not like 0 ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu có giảm giá trong bảng products theo origin_id
		public function getProductDiscountO ($origin_id, $from, $to) {
			$db = new connect();
			$query = "select * from products where origin_id = '$origin_id' and product_discount not like 0 ORDER BY product_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
// END HOMEPAGE

//PRODUCT

		//PRODUCT SELECTED FROM THE MENU
		//đếm số hàng trong bảng products theo brand_id
		public function countProductB ($brand_id){
			$db = new connect();
			$query = "select count(product_id) from products where brand_id = '$brand_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo feature_id
		public function countProductF ($feature_id){
			$db = new connect();
			$query = "select count(product_id) from products where feature_id = '$feature_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo origin_id
		public function countProductO ($origin_id){
			$db = new connect();
			$query = "select count(product_id) from products where origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo category_id
		public function countProductCategory ($category_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id = '$category_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo category_id và brand_id
		public function countProductCategoryB ($category_id, $brand_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id = '$category_id' and brand_id = '$brand_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo category_id và feature_id
		public function countProductCategoryF ($category_id, $feature_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id = '$category_id' and feature_id = '$feature_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo category_id và origin_id
		public function countProductCategoryO ($category_id, $origin_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id = '$category_id' and origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số hàng trong bảng products theo category_id với parent_id = 0
		public function countProductCategoryArrayParent ($category_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id'))";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo category_id với parent_id = 0 và brand_id
		public function countProductCategoryArrayParentB ($category_id, $brand_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) and brand_id = '$brand_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo category_id với parent_id = 0 và feature_id
		public function countProductCategoryArrayParentF ($category_id, $feature_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) and feature_id = '$feature_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo category_id với parent_id = 0 và origin_id
		public function countProductCategoryArrayParentO ($category_id, $origin_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) and origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số hàng trong bảng products theo mảng category_id
		public function countProductCategoryArray ($category_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id = '$category_id')";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo mảng category_id và brand_id
		public function countProductCategoryArrayB ($category_id, $brand_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id = '$category_id') and brand_id = '$brand_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo mảng category_id và feature_id
		public function countProductCategoryArrayF ($category_id, $feature_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id = '$category_id') and feature_id = '$feature_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng trong bảng products theo mảng category_id và origin_id
		public function countProductCategoryArrayO ($category_id, $origin_id){
			$db = new connect();
			$query = "select count(product_id) from products where category_id in (select category_id from categories where parent_id = '$category_id') and origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products
		public function getProductLimit ($from, $to){
			$db = new connect();
			$query = "select * from products limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo brand_id
		public function getProductLimitB ($brand_id, $from, $to){
			$db = new connect();
			$query = "select * from products where brand_id = '$brand_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo feature_id
		public function getProductLimitF ($feature_id, $from, $to){
			$db = new connect();
			$query = "select * from products where feature_id = '$feature_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo origin_id
		public function getProductLimitO ($origin_id, $from, $to){
			$db = new connect();
			$query = "select * from products where origin_id = '$origin_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo category_id
		public function getProductCategoryLimit ($category_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id = '$category_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo category_id và brand_id
		public function getProductCategoryLimitB ($category_id, $brand_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id = '$category_id' and brand_id = '$brand_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo category_id và feature_id
		public function getProductCategoryLimitF ($category_id, $feature_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id = '$category_id' and feature_id = '$feature_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo category_id và origin_id
		public function getProductCategoryLimitO ($category_id, $origin_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id = '$category_id' and origin_id = '$origin_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảng category_id với parent_id = 0
		public function getProductCategoryLimitArrayParent ($category_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảng category_id với parent_id = 0 và brand_id
		public function getProductCategoryLimitArrayParentB ($category_id, $brand_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) and brand_id = '$brand_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảngcategory_id với parent_id = 0 và feature_id
		public function getProductCategoryLimitArrayParentF ($category_id, $feature_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) and feature_id = '$feature_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảng category_id với parent_id = 0 và origin_id
		public function getProductCategoryLimitArrayParentO ($category_id, $origin_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) and origin_id = '$origin_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảng category_id
		public function getProductCategoryLimitArray ($category_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id = '$category_id') limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảng category_id và brand_id
		public function getProductCategoryLimitArrayB ($category_id, $brand_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id = '$category_id') and brand_id = '$brand_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảngcategory_id và feature_id
		public function getProductCategoryLimitArrayF ($category_id, $feature_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id = '$category_id') and feature_id = '$feature_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products theo mảng category_id và origin_id
		public function getProductCategoryLimitArrayO ($category_id, $origin_id, $from, $to){
			$db = new connect();
			$query = "select * from products where category_id in (select category_id from categories where parent_id = '$category_id') and origin_id = '$origin_id' limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		
		//PRODUCT SELECTED FROM THE HOMEPAGE
		//đếm số hàng giảm giá trong bảng products theo brand_id
		public function countProductDiscountB ($brand_id){
			$db = new connect();
			$query = "select count(product_id) from products where brand_id = '$brand_id' and product_discount not like 0";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số hàng giảm giá trong bảng products theo feature_id
		public function countProductDiscountF ($feature_id){
			$db = new connect();
			$query = "select count(product_id) from products where feature_id = '$feature_id' and product_discount not like 0";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số hàng giảm giá trong bảng products theo origin_id
		public function countProductDiscountO ($origin_id){
			$db = new connect();
			$query = "select count(product_id) from products where origin_id = '$origin_id' and product_discount not like 0";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng thương hiệu trong bảng products
		public function getProductDiscountBrand () {
			$db = new connect();
			$query = "select * from  brands JOIN products ON brands.brand_id = products.brand_id where product_discount not like 0 group by products.brand_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng tính năng trong bảng products
		public function getProductDiscountFeature () {
			$db = new connect();
			$query = "select * from  product_features JOIN products ON product_features.feature_id = products.feature_id where product_discount not like 0 group by products.feature_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng nguồn gốc trong bảng products
		public function getProductDiscountOrigin () {
			$db = new connect();
			$query = "select * from  in_origin JOIN products ON in_origin.origin_id = products.origin_id where product_discount not like 0 group by products.origin_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		
		// BRAND
		//lấy dữ liệu sản phẩm theo từng thương hiệu trong bảng products
		public function getProductBrand () {
			$db = new connect();
			$query = "select * from  brands JOIN products ON brands.brand_id = products.brand_id group by products.brand_id";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng thương hiệu trong bảng products
		public function countProductBrandById ($brand_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where brand_id = '$brand_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy dữ liệu sản phẩm theo từng thương hiệu của mỗi loại
		public function getProductCategoryBrand ($category_id) {
			$db = new connect();
			$query = "select * from  brands JOIN products ON brands.brand_id = products.brand_id where category_id = '$category_id' group by products.brand_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng thương hiệu của một mảng loại với parent_id = 0
		public function getProductCategoryBrandArrayParent ($category_id) {
			$db = new connect();
			$query = "select * from  brands JOIN products ON brands.brand_id = products.brand_id where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) group by products.brand_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng thương hiệu của một mảng loại
		public function getProductCategoryBrandArray ($category_id) {
			$db = new connect();
			$query = "select * from  brands JOIN products ON brands.brand_id = products.brand_id where category_id in (select category_id from categories where parent_id = '$category_id') group by products.brand_id";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng thương hiệu của mỗi loại
		public function countProductCategoryBrandById ($category_id, $brand_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where category_id = '$category_id' and  brand_id = '$brand_id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng thương hiệu của một loại mảng với parent_id = 0
		public function countProductCategoryBrandByIdArrayParent ($category_id, $brand_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where brand_id = '$brand_id' and category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) ";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng thương hiệu của một loại mảng
		public function countProductCategoryBrandByIdArray ($category_id, $brand_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where brand_id = '$brand_id' and category_id in (select category_id from categories where parent_id = '$category_id') ";
			$result = $db -> getInstance($query);
			return $result;
		}

		// FEATURE
		//lấy dữ liệu sản phẩm theo từng tính năng trong bảng products
		public function getProductFeature () {
			$db = new connect();
			$query = "select * from  product_features JOIN products ON product_features.feature_id = products.feature_id group by products.feature_id";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng tính năng trong bảng products
		public function countProductFeatureById ($feature_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where feature_id = '$feature_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy dữ liệu sản phẩm theo từng tính năng của mỗi loại
		public function getProductCategoryFeature ($category_id) {
			$db = new connect();
			$query = "select * from  product_features JOIN products ON product_features.feature_id = products.feature_id where category_id = '$category_id' group by products.feature_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng tính năng của một mảng loại với parent_id = 0
		public function getProductCategoryFeatureArrayParent ($category_id) {
			$db = new connect();
			$query = "select * from  product_features JOIN products ON product_features.feature_id = products.feature_id where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) group by products.feature_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng tính năng của một mảng loại
		public function getProductCategoryFeatureArray ($category_id) {
			$db = new connect();
			$query = "select * from  product_features JOIN products ON product_features.feature_id = products.feature_id where category_id in (select category_id from categories where parent_id = '$category_id') group by products.feature_id";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng tính năng của mỗi loại
		public function countProductCategoryFeatureById ($category_id, $feature_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where category_id = '$category_id' and  feature_id = '$feature_id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng tính năng của một mảng loại với parent_id = 0
		public function countProductCategoryFeatureByIdArrayParent ($category_id, $feature_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where feature_id = '$feature_id' and category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id'))";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng tính năng của một mảng loại
		public function countProductCategoryFeatureByIdArray ($category_id, $feature_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where feature_id = '$feature_id' and category_id in (select category_id from categories where parent_id = '$category_id')";
			$result = $db -> getInstance($query);
			return $result;
		}

		// ORIGIN
		//lấy dữ liệu sản phẩm theo từng tính năng trong bảng products
		public function getProductOrigin () {
			$db = new connect();
			$query = "select * from  in_origin JOIN products ON in_origin.origin_id = products.origin_id group by products.origin_id";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng tính năng trong bảng products
		public function countProductOriginById ($origin_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy dữ liệu sản phẩm theo từng tính năng của mỗi loại
		public function getProductCategoryOrigin ($category_id) {
			$db = new connect();
			$query = "select * from  in_origin JOIN products ON in_origin.origin_id = products.origin_id where category_id = '$category_id' group by products.origin_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng tính năng của một mảng loại với parent_id = 0
		public function getProductCategoryOriginArrayParent ($category_id) {
			$db = new connect();
			$query = "select * from  in_origin JOIN products ON in_origin.origin_id = products.origin_id where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) group by products.origin_id";
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy dữ liệu sản phẩm theo từng tính năng của một mảng loại
		public function getProductCategoryOriginArray ($category_id) {
			$db = new connect();
			$query = "select * from  in_origin JOIN products ON in_origin.origin_id = products.origin_id where category_id in (select category_id from categories where parent_id = '$category_id') group by products.origin_id";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng tính năng của mỗi loại
		public function countProductCategoryOriginById ($category_id, $origin_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where category_id = '$category_id' and  origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng tính năng của một mảng loại với parent_id = 0
		public function countProductCategoryOriginByIdArrayParent ($category_id, $origin_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where category_id in (select category_id from categories where parent_id in (select category_id from categories where parent_id = '$category_id')) and  origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//đếm số lượng sản phẩm theo từng tính năng của một mảng loại
		public function countProductCategoryOriginByIdArray ($category_id, $origin_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where category_id in (select category_id from categories where parent_id = '$category_id') and  origin_id = '$origin_id'";
			$result = $db -> getInstance($query);
			return $result;
		}

//END PRODUCT




	}
?>