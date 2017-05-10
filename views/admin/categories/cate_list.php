<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Banner
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- <div class="col-lg-12">
                        <div class="alert alert-danger" id="alert"></div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Category</th>
                                <th>Parent</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $list = new Categories();
                                $data = $list -> getCategories();
                                foreach ($data as $key) {

                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['category_id']; ?></td>
                                <td><?php echo $key['category_name']; ?></td>
                                <td><?php
                                     if($key['parent_id'] == 0){

                                         echo "Không có";

                                    }else{

                                        $parent = $list -> getCategoryById($key['parent_id']);
                                        echo $parent['category_name'];

                                     }

                                 ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa Category này. Toàn bộ sản phẩm liên quan cũng sẽ bị xóa')" href="?action=cateDel&id=<?php echo $key['category_id']; ?>"> Delete</a> | <i class="fa fa-pencil fa-fw"></i> <a href="?action=cateEdit&id=<?php echo $key['category_id']; ?>">Edit</a></td>
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
