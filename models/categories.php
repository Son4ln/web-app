<?php
	class Categories {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getCategories (){
			$db = new connect();
			$query = "select * from categories";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getCategoryById($id) {
			$db = new connect();
			$query = "select * from categories where category_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		
// MENU HEADER
		//lấy dữ liệu menu cấp 1
		public function showMenuParent (){
			$db = new connect();
			$query = "select * from categories where parent_id = '0'";
			$result = $db -> getList($query);
			return $result;
		}
		
		//kiểm tra menu cha có menu con hay không
		public function checkMenuParentChild ($id){
			$db = new connect();
			$query = "select * from categories where parent_id = '$id'";
			$result = $db->getInstance($query); 
            if($result!=null) 
                return true; 
            else 
                return false;
		}
		
		//lấy dữ liệu menu cấp 2
		public function showMenuChild ($id){
			$db = new connect();
			$query = "select * from categories where parent_id = '$id'";
			$result = $db -> getList($query);
			return $result;
		}
// END MENU HEADER

// MENU PATH & CURRENT POSITION
		//phương thức lấy 1 dòng dữ liệu từ parent_id
		public function getCategoryParent($parent_id) {
			$db = new connect();
			$query = "select * from categories where category_id = '$parent_id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//kiểm tra menu cha có menu con hay không
		public function checkCategoryParentChild ($id){
			$db = new connect();
			$query = "select * from categories where parent_id = '$id'";
			$result = $db->getInstance($query); 
            if($result!=null) 
                return true; 
            else 
                return false;
		}
		
		//phương thức lấy 1 dòng dữ liệu từ catagory_id
		public function getParentCategory($id) {
			$db = new connect();
			$query = "select * from categories where parent_id = '$id'";
			$result = $db -> getList($query);
			return $result;
		}

// END MENU PATH

		
		
		
		
		
		//kiểm tra id của bảng nhóm trong bảng categories
		/*public function checkGroup ($group_id){
			$db = new connect();
			$query = "select group_id from product_categories where group_id = '$group_id'";
			$result = $db->getInstance($query); 
            if($result!=null) 
                return true; 
            else 
                return false; 
		}
		//phương thức lấy tên theo từng nhóm
		public function getCategoryGroup ($group_id){
			$db = new connect();
			$query = "select category_id, category_name from product_categories where group_id = '$group_id'";
			$result = $db -> getList($query);
			return $result;
		}
		
		//phương thức lấy 1 dòng dữ liệu bằng id loại sản phẩm
		public function getCategoryGroupById($id) {
			$db = new connect();
			$query = "select category_id, category_name, product_categories.group_id, group_name, class_id from product_group JOIN product_categories ON product_group.group_id = product_categories.group_id where category_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		} */
		
	}
?>