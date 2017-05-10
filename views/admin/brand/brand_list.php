<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Brands
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>

                    <?php
                        $brand = new Brands();
                        $data = $brand -> getBrands ();
                    ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Brand</th>
                                <th>Hình Ảnh</th>
                                <th>Thao Tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key) {
                             ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['brand_id']; ?></td>
                                <td><?php echo $key['brand_name']; ?></td>
                                <td><img src="public/client/images/brand/<?php echo $key['brand_image']; ?>" width="100px"></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa Brand này. Toàn bộ sản phẩm liên quan cũng sẽ bị xóa')" href="?action=brandDel&id=<?php echo $key['brand_id']; ?>"> Delete</a> | <i class="fa fa-pencil fa-fw"></i> <a href="?action=brandEdit&id=<?php echo $key['brand_id']; ?>">Edit</a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
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