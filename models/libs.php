<?php
	function showAlert($mes)
	{
		return '<div class="alert alert-danger">'.$mes.'</div>';
	}

	function showSuccess($mes)
	{
		return '<div class="alert alert-success">'.$mes.'</div>';
	}

	//lấy menu phân cấp bằng phương pháp đệ quy

	function cateParent ($data,$parent = 0, $str = '') {
		foreach ($data as $value) {
			$id = $value['category_id'];
			$name = $value['category_name'];
			if($value['parent_id'] == $parent){
				echo "<option value='$id'>$str $name</option>";
				cateParent ($data,$id, $str.'- - ');
			}

		}
	}

	function selected ($value1, $value2){
		if ($value1 == $value2) {
			echo "selected";
		}
	}

	function redirect($action,$mes,$typeOfMes){
	echo "<script>
			window.location.href = '?action=$action';
			sessionStorage.mes = '$mes';
			sessionStorage.typeOfMes = '$typeOfMes';
		</script>";
	}
?>