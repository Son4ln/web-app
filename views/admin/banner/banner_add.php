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
                        <form action="?action=bannerAddAction" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="bImages" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <input class="form-control" name="bLink" placeholder="Nhập đường dẫn" />
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Banner</button>
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

