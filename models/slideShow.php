<?php
	class sliderShow {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu từ bảng slide
		public function getSlideShow (){
			$db = new connect();
			$query = "select * from slideshows";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getSlideShowById($id) {
			$db = new connect();
			$query = "select * from slideshows where slide_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng slide
		public function addSlideShow ($slideImg, $slideLink){
			$db = new connect();
			$query = "insert into slideshows values('','$slideImg','$slideLink')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng slide
		public function updateSlideShow ($id, $slideImg, $slideLink) {
			$db = new connect();
			$query = "update slideshows set slide_image = '$slideImg', slide_link = '$slideLink' where slide_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng slide thông qua id
		public function delSlideShow ($id){
			$db = new connect();
			$query = "delete from slideshows where slide_id='$id'";
			$db -> exec($query);
		}
	}
?>