<?php
	Class logo {
		public function __construct(){

		}
		//Logo chỉ có thể thay thế hình ảnh chứ k thể xóa
		public function updateLogo ($companyName,$logoImg) {
			$db = new connect();
			$query = "update logo set logo_image = '$logoImg' where company_name = '$companyName'";
			$db->exec($query);
		}

		public function getLogo ($id) {
			$db = new connect();
			$select = "select * from logo";
			$result = $db->getList($select);
			return $result;
		}
	}
?>