<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blog
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->

                    <?php
                        $blog = new Blogs();
                        $data = $blog -> getBlogById($id);
                     ?>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=blogEditAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input type="hidden" name="blogId" value="<?php echo $data['blog_id'] ?>">
                            <input class="form-control" name="blogTitle" value="<?php echo $data['blog_title'] ?>" placeholder="Vui lòng nhập tiêu đề" />
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện cũ</label>
                           <img src="public/client/images/blog/<?php echo $data['featured_image'] ?>" width="200">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="hidden" name="oldImg" value="<?php echo $data['featured_image'] ?>" />
                            <input class="form-control" name="featureImg" type="file" placeholder="Please Enter Category Keywords" />
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="desc" class="form-control" value=""  placeholder="Vui lòng nhập mô tả"><?php echo $data['blog_description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung bài viết</label>
                            <textarea name="contents" class="form-control" value=""><?php echo $data['blog_content'] ?></textarea>
                            <script>
                                CKEDITOR.replace( 'contents');
                            </script>
                        </div>
                        <button type="submit" name="brandUpload" class="btn btn-primary">Sửa Blog</button>
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

