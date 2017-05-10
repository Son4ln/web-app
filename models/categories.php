<?php
	class Categories {
		public function __construct(){

		}

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

		//thêm dữ liệu vào bảng
		public function addCategory ($name,$parent){
			$db = new connect();
			$query = "insert into categories values('','$name','$parent')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateCategory ($id, $name,$parent) {
			$db = new connect();
			$query = "update categories set category_name = '$name', parent_id = '$parent' where category_id = '$id'";
			$db -> exec($query);
		}

		//phương thức lấy dữ liệu từ catagory_id
		public function getParentCategory($id) {
			$db = new connect();
			$query = "select * from categories where parent_id = '$id'";
			$result = $db -> getList($query);
			return $result;
		}
		
		//phương thức lấy 1 dòng dữ liệu từ catagory_id
		public function getCategoryByParentId($id) {
			$db = new connect();
			$query = "select * from categories where parent_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		public function delCategory ($id){
			$db = new connect();
			$query = "delete from categories where category_id='$id'";
			$db -> exec($query);
		}

// END MENU PATH


	}
?>