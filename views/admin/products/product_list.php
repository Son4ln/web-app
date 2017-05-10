<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <style type="text/css">
            #showMes {
                display: none
            }
        </style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Category</th>
                                <th>Upload By</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products = new Products();
                                $data = $products -> getProducts();
                                foreach ($data as $value) {
                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $value['product_id']; ?></td>
                                <td><?php echo $value['product_name']; ?></td>
                                <td><img src="public/client/images/product/<?php echo $value['product_image']; ?>" width="100"></td>
                                <td><?php echo $value['product_price']; ?></td>
                                <td><?php
                                    $cate = new Categories();
                                    $result = $cate -> getCategoryById($value['category_id']);
                                    echo $result['category_name'];

                                ?></td>
                                <td><?php
                                    $user = new Users();
                                    $resultUser = $user -> getUserById($value['user_id']);
                                    echo $resultUser['full_name'];
                                ?></td>

                                <td class="center">

                                    <i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa sản phẩm này')" href="?action=productDel&id=<?php echo $value['product_id']; ?>"> Delete</a><br/><hr style="margin: 0;padding: 0"/>
                                    <i class="fa fa-pencil fa-fw"></i> <a href="?action=productEdit&id=<?php echo $value['product_id']; ?>">Edit</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>
