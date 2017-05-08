<?php
	class contactInfo {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getContactInfo (){
			$db = new connect();
			$query = "select * from contact_info";
			$result = $db -> getList($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addContactInfo ($company_name, $address, $headquarters, $branch, $contact_email, $vietnam_phone, $australia_phone, $fax, $logo_image){
			$db = new connect();
			$query = "insert into contact_info values('','$company_name','$address','$headquarters', '$branch', '$contact_email', '$vietnam_phone', '$australia_phone', '$fax', '$logo_image')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateContactInfo ($id, $company_name, $address, $headquarters, $branch, $contact_email, $vietnam_phone, $australia_phone, $fax, $logo_image) {
			$db = new connect();
			$query = "update contact_info set company_name = '$company_name', address = '$address', headquarters = '$headquarters', branch = '$branch', contact_email = '$contact_email', vietnam_phone = '$vietnam_phone', australia_phone = '$australia_phone', fax = '$fax', logo_image = '$logo_image' where info_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delContactInfo ($id){
			$db = new connect();
			$query = "delete from contact_info where info_id ='$id'";
			$db -> exec($query);
		}
	}
?>