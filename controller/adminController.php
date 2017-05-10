<?php
switch ($action){
  case "admin":
    include "../views/admin/home.php";
    break;
    //danh sách brand
  case 'brandList':
    include "../views/admin/brand/brand_list.php";
    break;
    // layout band Add
  case 'brandAdd':
    $alert = "";
    include "../views/admin/brand/brand_add.php";
    break;
    // Brand delete
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
    // Brand add action
  case 'brandAddAction':
    $brand = new Brands();
    $brandName = $_POST['brandName'];
    // kiểm tra và upload hình ảnh
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
        break;
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
    // Sửa brand layout
  case 'brandEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/brand/brand_edit.php";
    break;
    // Sửa brand action
  case 'brandEditAction':
    $brand = new Brands();
    $id = $_POST['brandId'];
    $brandName = $_POST['brandName'];
    // kiểm tra và upload hình ảnh
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
     // danh sách user
  case 'userList':
  	include "../views/admin/users/user_list.php";
  	break;
    // thêm user layout
  case 'userAdd':
    $alert = "";
  	include "../views/admin/users/user_add.php";
  	break;
    // thêm user action
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
    // sửa user layout
  case 'userEdit':
    $id = $_GET['id'];
    $alert = "";
  	include "../views/admin/users/user_edit.php";
  	break;
    // phân quyền user
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
    // xóa User
  case 'delUser':
    $mes = "Xóa User thành công";
    $user = new Users();
    $id = $_GET['id'];
    $user -> delUser($id);
    $action = 'userList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // danh sách banner
  case 'bannerList':
    include "../views/admin/banner/banner_list.php";
    break;
    // thêm banner layout
  case 'bannerAdd':
    $alert = "";
    include "../views/admin/banner/banner_add.php";
    break;
    // thêm banner action
  case 'bannerAddAction':
      $slider = new sliderShow();
      // bắt lỗi và upload hình ảnh
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
      //Sửa banner layout
  case 'bannerEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/banner/banner_edit.php";
    break;
    //sửa banner action
  case 'bannerEditAction':
    $slider = new sliderShow();
    $id = $_POST['bId'];
    //bắt lỗi và upload hình ảnh
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
    //xóa banner
  case 'bannerdel':
    $id = $_GET['id'];
    $slider = new sliderShow();
    $slider -> delSlideShow($id);
    $mes = "Xóa Banner thành công";
    $action = 'bannerList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // danh sách sản phẩm
  case 'productList':
    $success = "";
    include "../views/admin/products/product_list.php";
    break;
    // layout product add
  case 'productAdd':
  $alert = "";
    include "../views/admin/products/product_add.php";
    break;
    // product add action
  case 'productAddAction':
    $products = new Products();
    // bắt lỗi và upload hình ảnh
    if(empty($_FILES['fImages1']['name'])){
      $mes = "Ảnh 1 không được để trống";
      $alert = showAlert($mes);
      include "../views/admin/products/product_add.php";
      break;
    }
    if(!empty($_FILES['fImages1']['name'])){
      if( $_FILES['fImages1']['type'] != 'image/jpeg'
        && $_FILES['fImages1']['type'] != 'image/png'
        && $_FILES['fImages1']['type'] != 'image/gif'){

        $mes = "Ảnh 1 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
      if(isset($_FILES['fImages1'])){
        $img = 'one'.'-'.time().'-'.$_FILES['fImages1']['name'];
        $source = $_FILES['fImages1']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
      }
    }

    if(!empty($_FILES['fImages2']['name'])){
      if( $_FILES['fImages2']['type'] != 'image/jpeg'
        && $_FILES['fImages2']['type'] != 'image/png'
        && $_FILES['fImages2']['type'] != 'image/gif'){

        $mes = "Ảnh 2 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
      if(isset($_FILES['fImages2'])){
        $img1 = -'two'.'-'.time().'-'.$_FILES['fImages2']['name'];
        $source = $_FILES['fImages2']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img1;
        move_uploaded_file($source, $target);
      }
    }else {
      $img1 = "";
    }

    if(!empty($_FILES['fImages3']['name'])){
      if( $_FILES['fImages3']['type'] != 'image/jpeg'
        && $_FILES['fImages3']['type'] != 'image/png'
        && $_FILES['fImages3']['type'] != 'image/gif'){

        $mes = "Ảnh 3 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
      if(isset($_FILES['fImages3'])){
        $img2 = 'thee'.'-'.time().'-'.$_FILES['fImages3']['name'];
        $source = $_FILES['fImages3']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img2;
        move_uploaded_file($source, $target);
      }
    }else {
      $img2 = "";
    }
    $name = $_POST['txtName'];
    $price = $_POST['txtPrice'];
    $discount = $_POST['txtDiscount'];
    $currency = $_POST['txtCurrency'];
    $desc = $_POST['txtDesc'];
    $detail = $_POST['txtDetail'];
    $stock = $_POST['txtStock'];
    if($name == "" || $price == "" || $discount == "" || $currency == "" || $desc == "" || $detail == "" || $stock == ""){
       $mes = "Vui lòng nhập đầy đủ thông tin";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
    $cate = $_POST['cateId'];
    $feature = $_POST['featureId'];
    $brand = $_POST['brandId'];
    $origin = $_POST['originId'];
    $user = 1;
    $products -> addProducts($name, $img, $img1, $img2, $price, $discount, $currency, $desc, $detail, $stock, $cate, $feature, $brand, $origin, $user);

    $action = 'productList';
    $mes = 'Thêm sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // layout sửa sản phẩm
  case 'productEdit':
    $id = $_GET['id'];
    $alert = "";
    include "../views/admin/products/product_edit.php";
    break;
    // action sửa sản phẩm
  case 'productEditAction':
    $products = new Products();
    $id = $_POST['prodId'];
    $name = $_POST['txtName'];
   // bắt lỗi và upload hình ảnh
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
    $products -> updateProduct($id, $name, $img, $img1, $img2, $price, $discount, $currency, $desc, $detail, $stock, $cate, $feature, $brand, $origin, $user);

    // $mes = "Sửa sản phẩm thành công";
    // $success = showSuccess($mes);
    // include "../views/admin/products/product_list.php";
    $action = 'productList';
    $mes = 'Sửa sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // xóa sản phẩm
  case 'productDel':
    $products = new Products();
    $id = $_GET['id'];
    $products -> delProduct($id);
    $action = 'productList';
    $mes = 'Xóa sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // danh sách categories
  case 'cateList':
    $success = "";
    include "../views/admin/categories/cate_list.php";
    break;
    // layout thêm categories
  case 'cateAdd':
    $alert = "";
    include "../views/admin/categories/cate_add.php";
    break;
// action thêm categories
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
      // layout sửa categories
  case 'cateEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/categories/cate_edit.php";
    break;
    // action sửa categories
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
    // xóa categories
  case 'cateDel':
    $cate = new Categories();
    $id = $_GET['id'];
    $cate -> delCategory($id);
    $mes = "Xóa Categories thành công";
    $action = 'cateList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // danh sách blog
  case 'blogList':
    include "../views/admin/blogs/blog_list.php";
    break;
    // sửa blog layout
  case 'blogEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/blogs/blog_edit.php";
    break;
    // action sửa blog
  case 'blogEditAction':
    $blog = new Blogs();
    $id = $_POST['blogId'];
    if($_POST['blogTitle'] == ""){
      $mes = "Vui lòng nhập tiêu đề";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_edit.php";
      break;
    }else{
      $title = $_POST['blogTitle'];
    }
    //kiêm tra và upload hình ảnh
    if(!empty($_FILES['featureImg']['name'])){
      if( $_FILES['featureImg']['type'] != 'image/jpeg'
        && $_FILES['featureImg']['type'] != 'image/png'
        && $_FILES['featureImg']['type'] != 'image/gif'){

        $mes = "Ảnh không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/blogs/blog_edit.php";
        break;
      }
      if(isset($_FILES['featureImg'])){
        $img = time().'-'.$_FILES['featureImg']['name'];
        $source = $_FILES['featureImg']['tmp_name'];
        $target = $blog_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
        if(file_exists($blog_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg'])){
          unlink($blog_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg']);
        }
      }
    }else {
      $img = $_POST['oldImg'];
    }
    if($_POST['desc'] == ""){
      $mes = "Vui lòng nhập mô tả";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_edit.php";
      break;
    }else{
      $desc = $_POST['desc'];
    }

    if ($_POST['contents'] == "") {
      $mes = "Vui lòng nhập nội dung";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_edit.php";
      break;
    }else{
      $content = $_POST['contents'];
    }
    $blog -> updateBlog($id, $title, $img, $desc, $content);

    $mes = "Sửa Blogs thành công";
    $action = 'blogList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // thêm blog
  case 'blogAdd':
    $alert = "";
    include "../views/admin/blogs/blog_add.php";
    break;
    // thêm blog action
  case 'blogAddAction':
    $blog = new Blogs();
    if($_POST['blogTitle'] == ""){
      $mes = "Vui lòng nhập tiêu đề";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_add.php";
      break;
    }else{
      $title = $_POST['blogTitle'];
    }
    //kiểm tra và upload hình ảnh
    if(!empty($_FILES['featureImg']['name'])){
      if( $_FILES['featureImg']['type'] != 'image/jpeg'
        && $_FILES['featureImg']['type'] != 'image/png'
        && $_FILES['featureImg']['type'] != 'image/gif'){

        $mes = "Ảnh không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/blogs/blog_add.php";
        break;
      }
      if(isset($_FILES['featureImg'])){
        $img = time().'-'.$_FILES['featureImg']['name'];
        $source = $_FILES['featureImg']['tmp_name'];
        $target = $blog_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
      }
    }
    if($_POST['desc'] == ""){
      $mes = "Vui lòng nhập mô tả";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_add.php";
      break;
    }else{
      $desc = $_POST['desc'];
    }

    if ($_POST['contents'] == "") {
      $mes = "Vui lòng nhập nội dung";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_add.php";
      break;
    }else{
      $content = $_POST['contents'];
    }
    $blog -> addBlogs($title, $img, $desc, $content);
    $mes = "Thêm Blogs thành công";
    $action = 'blogList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // xóa blog
  case 'blogDel':
    $id = $_GET['id'];
    $blog = new Blogs();
    $blog -> delBlog($id);
    $mes = "Xóa Blogs thành công";
    $action = 'blogList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
}
?>