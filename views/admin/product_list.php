<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
<<<<<<< HEAD:views/admin/product_list.php
=======
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>
>>>>>>> 970dc3500c59f4c9455cb633d063c7bf865d0286:views/admin/banner/banner_list.php
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
<<<<<<< HEAD:views/admin/product_list.php
                                <td>1</td>
                                <td>Áo Thun Nana</td>
                                <td>200.000 VNĐ</td>
                                <td>3 Minutes Age</td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="?action=productEdit">Edit</a></td>
=======
                                <td><?php echo $key['slide_id']; ?></td>
                                <td><img src="public/client/images/slideshow/<?php echo $key['slide_image']; ?>" width="150px"></td>
                                <td><?php echo $key['slide_link']; ?></td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa Banner này')" href="?action=bannerdel&id=<?php echo $key['slide_id']; ?>"> Delete</a> | <i class="fa fa-pencil fa-fw"></i> <a href="?action=bannerEdit&id=<?php echo $key['slide_id']; ?>">Edit</a></td>
>>>>>>> 970dc3500c59f4c9455cb633d063c7bf865d0286:views/admin/banner/banner_list.php
                            </tr>
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
