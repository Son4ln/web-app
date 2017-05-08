<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=cateEditAction" method="POST" enctype="multipart/form-data">
                            <?php
                                $slide = new Categories();
                                $data = $slide -> getCategoryById($id);
                             ?>
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <input class="form-control" type="hidden" name="cateId" value="<?php echo $data['category_id']; ?>" />
                                <input class="form-control" name="cateName" value="<?php echo $data['category_name']; ?>" placeholder="Nhập đường dẫn" />
                            </div>
                            <div class="form-group">
                                <label>Parent</label>
                                <?php
                                    $list = new Categories();
                                    $datas = $list -> getCategories();

                                ?>
                                <select name="parent" class="form-control">
                                    <option value="0">Không có parent</option>
                                    <?php foreach ($datas as $key) {
                                        ?>
                                        <option value="<?php echo $key['category_id'] ?>"
                                            <?php if($key['category_id'] == $data['parent_id']){
                                                echo "selected='selected'";
                                                } ?>
                                        ><?php echo $key['category_name'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa Category</button>
                            <a onclick="goback()" class="btn btn-default">Cancel</a>
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
