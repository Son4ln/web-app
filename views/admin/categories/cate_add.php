<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=cateAddAction" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên Category</label>
                                <input class="form-control" name="cateName" placeholder="Nhập Category" />
                            </div>
                            <div class="form-group">
                                <label>Parent</label>
                                <?php
                                    $list = new Categories();
                                    $data = $list -> getCategories();
                                    $cate = array();
                                    while($row = $data->fetch()) {
                                        $cate[] = $row;
                                    }
                                ?>
                                <select name="parent" class="form-control">
                                    <option value="0">Không có parent</option>
                                    <?php cateParent($cate); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Category</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>

