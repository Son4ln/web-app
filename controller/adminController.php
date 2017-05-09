<?php
switch ($action){
  case "admin":
    include "../views/admin/home.php";
    break;

  case 'brandList':
    include "../views/admin/brand/brand_list.php";
    break;

  case 'brandAdd':
    $alert = "";
    include "../views/admin/brand/brand_add.php";
    break;

  case 'brandDel':
    $mes = "Xóa Brand thành công";
    $brand = new Brands();
    $id = $_GET['id'];
    $brand -> delBrand($id);
    $mes = "Xóa Brand thành công";
    $action = 'brandList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'brandAddAction':
    $brand = new Brands();
    $brandName = $_POST['brandName'];
    if (empty($_FILES['brandImg'])
        || $_FILES['brandImg']['type'] != 'image/jpeg'
        && $_FILES['brandImg']['type'] != 'image/png'
        && $_FILES['brandImg']['type'] != 'image/gif')
      {
        $mes = "Vui lòng chọn hình ảnh (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_add.php";
        break;
    }
    if(isset($_FILES['brandImg'])){
        $brandImg= time().'-'.$_FILES['brandImg']['name'];
        $source=$_FILES['brandImg']['tmp_name'];
        $target=$brand_dir.DIRECTORY_SEPARATOR.$brandImg;
        move_uploaded_file($source, $target);
      }
    if(isset($_POST['brandUpload'])){
      if( $brandName == "" ){
        $mes = "Vui lòng nhập Brand Name";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_add.php";
      }
      else {
        $brand -> addBrands($brandName, $brandImg);
        $mes = 'Thêm Brand thành công';
        $action = 'brandList';
        $typeOfMes = 'alert-success';
        redirect($action,$mes,$typeOfMes);
      }
    }
    break;

  case 'brandEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/brand/brand_edit.php";
    break;

  case 'brandEditAction':
    $brand = new Brands();
    $id = $_POST['brandId'];
    $brandName = $_POST['brandName'];
    if(!empty($_FILES['brandImg']['name'])){
      if (
         $_FILES['brandImg']['type'] != 'image/jpeg'
        && $_FILES['brandImg']['type'] != 'image/png'
        && $_FILES['brandImg']['type'] != 'image/gif'
        )
      {
        $mes = "Vui lòng chọn hình ảnh (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_add.php";
        break;
    }
     if(isset($_FILES['brandImg'])){
        $brandImg= time().'-'.$_FILES['brandImg']['name'];
        $source=$_FILES['brandImg']['tmp_name'];
        $target=$brand_dir.DIRECTORY_SEPARATOR.$brandImg;
        move_uploaded_file($source, $target);
        unlink($brand_dir.DIRECTORY_SEPARATOR.$_POST['oldImg']);
      }
    }else{
      $brandImg = $_POST['oldImg'];
    }

     if($_POST['brandName'] == ""){
        $mes = "Vui lòng nhập tên Brand";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_edit.php";
     }
     else
     {
      $brand -> updateBrand($id, $brandName, $brandImg);
      $mes = "Sửa Brand thành công";
      $action = 'brandList';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
     }
     break;

  case 'userList':
  	include "../views/admin/users/user_list.php";
  	break;

  case 'userAdd':
    $alert = "";
  	include "../views/admin/users/user_add.php";
  	break;

  case 'userAddAction':
    $user = new Users();
    $name = $_POST['txtFullName'];
    $username = $_POST['txtUser'];
    $pass = $_POST['txtPass'];
    $rePass = $_POST['txtRePass'];
    $password=md5($username . $pass);
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $address = $_POST['txtAddr'];
    $permis = $_POST['permis'];
    //upload hình ảnh
    if(empty($_FILES['txtAva'])
        || $_FILES['txtAva']['type'] != 'image/jpeg'
        && $_FILES['txtAva']['type'] != 'image/png'
        && $_FILES['txtAva']['type'] != 'image/gif'
        ){
          $mes = 'Vui chọn hình ảnh (jpg,png,gif)';
          $alert = showAlert($mes);
          include "../views/admin/users/user_add.php";
          break;
      }
    if(isset($_FILES['txtAva'])){
        $avat= time().'-'.$_FILES['txtAva']['name'];
        $source=$_FILES['txtAva']['tmp_name'];
        $target=$ava_dir_path.DIRECTORY_SEPARATOR.$avat;
        move_uploaded_file($source, $target);
      }

    //Bắt lỗi
    if (isset($_POST['uploadclick']))
    {
      if($pass != $rePass){
        $mes = 'Xác nhận mật khẩu sai';
        $alert = showAlert($mes);
        include "../views/admin/users/user_add.php";
      }else if ($name == "" || $username == "" || $pass == "" || $email == "" || $phone == "" || $address == "" || $avat == "" || $permis == "")
      {
        $mes = 'Vui lòng nhập đầy đủ thông tin';
        $alert = showAlert($mes);
        include "../views/admin/user_add.php";
      }
      else{
        $mes = "Thêm User thành công";
        $user->addUser($name, $username, $password, $email, $phone, $address, $avat, $permis);
        $action = 'userList';
        $typeOfMes = 'alert-success';
        redirect($action,$mes,$typeOfMes);
      }

    }

    break;

  case 'userEdit':
    $id = $_GET['id'];
    $alert = "";
  	include "../views/admin/users/user_edit.php";
  	break;

  case 'userPermisAction':
    $alert = "";
    $user = new Users();
    $id = $_POST['userID'];
    $permis = $_POST['permis'];
    $user -> permission($id, $permis);
    $mes = "Phân quyền thành công";
    $action = 'userList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'delUser':
    $mes = "Xóa User thành công";
    $user = new Users();
    $id = $_GET['id'];
    $user -> delUser($id);
    $action = 'userList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'bannerList':
    include "../views/admin/banner/banner_list.php";
    break;

  case 'bannerAdd':
    $alert = "";
    include "../views/admin/banner/banner_add.php";
    break;

  case 'bannerAddAction':
      $slider = new sliderShow();
      if(empty($_FILES['bImages'])
          || $_FILES['bImages']['type'] != 'image/jpeg'
        && $_FILES['bImages']['type'] != 'image/png'
        && $_FILES['bImages']['type'] != 'image/gif'
        ){
        $mes = "Vui lòng chọn hình ảnh (jpg, png, gif)";
        $alert = showAlert($mes);
        include "../views/admin/banner/banner_add.php";
        break;
      }
      if(isset($_FILES['bImages'])){
        $img = time().'-'.$_FILES['bImages']['name'];
        $source = $_FILES['bImages']['tmp_name'];
        $target = $banner_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
      }
      $link = $_POST['bLink'];
      if($_POST['bLink'] == ""){
        $mes = "Vui lòng nhập đường dẫn";
        $alert = showAlert($mes);
        include "../views/admin/banner/banner_add.php";
        break;
      }
      $slider -> addSlideShow($img, $link);
      $mes = "Thêm Banner thành công";
      $action = 'bannerList';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
      break;

  case 'bannerEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/banner/banner_edit.php";
    break;

  case 'bannerEditAction':
    $slider = new sliderShow();
    $id = $_POST['bId'];
    if(!empty($_FILES['bImages']['name'])){
      if(
        $_FILES['bImages']['type'] != 'image/jpeg'
        && $_FILES['bImages']['type'] != 'image/png'
        && $_FILES['bImages']['type'] != 'image/gif'
        ){
        $mes = "Vui lòng chọn hình ảnh (jpg, png, gif)";
        $alert = showAlert($mes);
        include "../views/admin/banner/banner_add.php";
        break;
      }
      if(isset($_FILES['bImages'])){
        $img = time().'-'.$_FILES['bImages']['name'];
        $source = $_FILES['bImages']['tmp_name'];
        $target = $banner_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
        unlink($banner_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg']);
      }
    }else{
      $img = $_POST['oldImg'];
    }
    $link = $_POST['bLink'];
    if($_POST['bLink'] == ""){
      $mes = "Vui lòng nhập link";
      $alert = showAlert($mes);
      include "../views/admin/banner/banner_edit.php";
      break;
    }
    $slider -> updateSlideShow($id, $img, $link);
    $mes = "Sửa Banner thành công";
    $action = 'bannerList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'bannerdel':
    $id = $_GET['id'];
    $slider = new sliderShow();
    $slider -> delSlideShow($id);
    $mes = "Xóa Banner thành công";
    $action = 'bannerList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'productList':
    $success = "";
    include "../views/admin/products/product_list.php";
    break;

  case 'productAdd':
  $alert = "";
    include "../views/admin/products/product_add.php";
    break;

  case 'productEdit':
    $id = $_GET['id'];
    $alert = "";
    include "../views/admin/products/product_edit.php";
    break;

  case 'productEditAction':
    $products = new Products();
    $id = $_POST['prodId'];
    $name = $_POST['txtName'];
    if(!empty($_FILES['fImages1']['name'])){
      if( $_FILES['fImages1']['type'] != 'image/jpeg'
        && $_FILES['fImages1']['type'] != 'image/png'
        && $_FILES['fImages1']['type'] != 'image/gif'){

        $mes = "Ảnh 1 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_edit.php";
        break;
    }
      if(isset($_FILES['fImages1'])){
        $img = 'one'.'-'.time().'-'.$_FILES['fImages1']['name'];
        $source = $_FILES['fImages1']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
        unlink($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages1']);
      }
    }else{
      $img = $_POST['oldImages1'];
    }

    if(!empty($_FILES['fImages2']['name'])){
      if( $_FILES['fImages2']['type'] != 'image/jpeg'
        && $_FILES['fImages2']['type'] != 'image/png'
        && $_FILES['fImages2']['type'] != 'image/gif'){

        $mes = "Ảnh 2 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_edit.php";
        break;
    }
      if(isset($_FILES['fImages2'])){
        $img1 = -'two'.'-'.time().'-'.$_FILES['fImages2']['name'];
        $source = $_FILES['fImages2']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img1;
        move_uploaded_file($source, $target);
        unlink($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages2']);
      }
    }else{
      $img1 = $_POST['oldImages2'];
    }

    if(!empty($_FILES['fImages3']['name'])){
      if( $_FILES['fImages3']['type'] != 'image/jpeg'
        && $_FILES['fImages3']['type'] != 'image/png'
        && $_FILES['fImages3']['type'] != 'image/gif'){

        $mes = "Ảnh 3 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_edit.php";
        break;
    }
      if(isset($_FILES['fImages3'])){
        $img2 = 'thee'.'-'.time().'-'.$_FILES['fImages3']['name'];
        $source = $_FILES['fImages3']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img2;
        move_uploaded_file($source, $target);
        unlink($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages3']);
      }
    }else{
      $img2 = $_POST['oldImages3'];
    }

    if(!empty($_FILES['fImages4']['name'])){
      if( $_FILES['fImages4']['type'] != 'image/jpeg'
        && $_FILES['fImages4']['type'] != 'image/png'
        && $_FILES['fImages4']['type'] != 'image/gif'){

        $mes = "Ảnh 4 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_edit.php";
        break;
    }
      if(isset($_FILES['fImages4'])){
        $img3 = 'four'.'-'.time().'-'.$_FILES['fImages4']['name'];
        $source = $_FILES['fImages4']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img3;
        move_uploaded_file($source, $target);
        unlink($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages4']);
      }
    }else{
      $img3 = $_POST['oldImages4'];
    }
    $price = $_POST['txtPrice'];
    $discount = $_POST['txtDiscount'];
    $currency = $_POST['txtCurrency'];
    $desc = $_POST['txtDesc'];
    $detail = $_POST['txtDetail'];
    $stock = $_POST['txtStock'];
    $cate = $_POST['cateId'];
    $feature = $_POST['featureId'];
    $brand = $_POST['brandId'];
    $origin = $_POST['originId'];
    $user = 1;
    $products -> updateProduct($id, $name, $img, $img1, $img2, $img3, $price, $discount, $currency, $desc, $detail, $stock, $cate, $feature, $brand, $origin, $user);

    // $mes = "Sửa sản phẩm thành công";
    // $success = showSuccess($mes);
    // include "../views/admin/products/product_list.php";
    $action = 'productList';
    $mes = 'Sửa sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'productDel':
    $products = new Products();
    $id = $_GET['id'];
    $products -> delProduct($id);
    $action = 'productList';
    $mes = 'Xóa sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'cateList':
    $success = "";
    include "../views/admin/categories/cate_list.php";
    break;

  case 'cateAdd':
    $alert = "";
    include "../views/admin/categories/cate_add.php";
    break;

  case 'cateAddAction':
      $cate = new Categories();
      $name = $_POST['cateName'];
      $parent = $_POST['parent'];
      if($name == ""){
        $mes = "Vui lòng nhập tên Category";
        $alert = showAlert($mes);
        include "../views/admin/categories/cate_add.php";
        break;
      }

      $cate ->addCategory($name,$parent);
      $mes = "Thêm Categories thành công";
      $action = 'cateList';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
      break;

  case 'cateEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/categories/cate_edit.php";
    break;

  case 'cateEditAction':
    $cate = new Categories();
    $id = $_POST['cateId'];
    $cateName = $_POST['cateName'];
    $parent = $_POST['parent'];
    if( $cateName == "" ){
      $mes = "Vui lòng nhập tên Categories";
      $alert = showAlert($mes);
      include "../views/admin/categories/cate_edit.php";
      break;
    }
    $cate -> updateCategory($id, $cateName, $parent);
    $mes = "Sửa Categories thành công";
    $action = 'cateList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;

  case 'cateDel':
    $cate = new Categories();
    $id = $_GET['id'];
    $cate -> delCategory($id);
    $mes = "Xóa Categories thành công";
    $action = 'cateList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
}
?>