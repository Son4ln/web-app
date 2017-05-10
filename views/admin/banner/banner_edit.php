<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Banner
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=bannerEditAction" method="POST" enctype="multipart/form-data">
                            <?php
                                $slide = new sliderShow();
                                $data = $slide -> getSlideShowById($id);
                             ?>
                            <input type="hidden" name="bId" value="<?php echo $data['slide_id']; ?>"  class="form-control">
                            <div class="form-group">
                                <label>Ảnh cũ</label>
                                <input class="form-control" type="hidden" name="oldImg" value="<?php echo $data['slide_image']; ?>"/>
                                <img src="public/client/images/slideshow/<?php echo $data['slide_image']; ?>" width="150">
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="bImages" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <input class="form-control" name="bLink" value="<?php echo $data['slide_link']; ?>" placeholder="Nhập đường dẫn" />
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa Banner</button>
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
