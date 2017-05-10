<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Banner
                            <small>Add</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=addMaximAction" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="mContent" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Background</label>
                                <select name="mbackground" class="form-control">
                                    <option value="border-box">
                                         Nền tròn , trắng
                                     </option>
                                    <option value="no-border">
                                        Không nền , không viền
                                    </option>
                                    <option value="border-box-right">
                                        Không nền, viền vuông dạng chấm đỏ
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Châm Ngôn</button>
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

