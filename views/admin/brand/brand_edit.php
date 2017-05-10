<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Brand
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->

                    <?php
                        $brand = new Brands();
                        $data = $brand -> getBrandById($id);
                     ?>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=brandEditAction" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="hidden" value="<?php echo $data['brand_id']; ?>" name="brandId" />
                            <label>Tên Brand</label>
                            <input class="form-control" value="<?php echo $data['brand_name']; ?>" name="brandName" />
                        </div>
                        <div class="form-group">
                            <label>Ảnh cũ</label>
                            <img src="public/client/images/brand/<?php echo $data['brand_image']; ?>" width="150px">
                            <input class="form-control" type="hidden" value="<?php echo $data['brand_image']; ?>" name="oldImg" placeholder="Please Enter Category Order" />
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input class="form-control" name="brandImg" type="file" />
                        </div>
                        <button type="submit" name="brandUpload" class="btn btn-primary">Sửa Brand</button>
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

