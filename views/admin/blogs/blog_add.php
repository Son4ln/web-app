<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog
                        <small>Add</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    <?php echo $alert; ?>
                </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="?action=blogAddAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="blogTitle" placeholder="Vui lòng nhập tiêu đề" />
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input class="form-control" name="featureImg" type="file" placeholder="Please Enter Category Keywords" />
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="desc" class="form-control" placeholder="Vui lòng nhập mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung bài viết</label>
                            <textarea name="contents" class="form-control" placeholder="Vui lòng nhập nội dung"></textarea>
                            <script>
                                CKEDITOR.replace( 'contents');
                            </script>
                        </div>
                        <button type="submit" name="brandUpload" class="btn btn-primary">Thêm Blog</button>
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

