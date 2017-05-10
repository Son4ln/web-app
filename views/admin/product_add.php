<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>

                    <?php
                            $cate = new Categories();
                            $category = $cate -> getCategories();
                            $feature = new Features();
                            $features = $feature -> getFeatures();
                            $brand = new Brands();
                            $brands = $brand -> getBrands();
                            $origin = new Origin();
                            $origins = $origin -> getOrigin();
                        ?>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=productAddAction" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="txtName"  />
                            </div>
                            <div class="form-group">
                                <label>Ảnh 1</label>
                                <input type="file" class="form-control" name="fImages1">
                            </div>
                            <div class="form-group">
                                <label>Ảnh 2</label>
                                <input type="file" class="form-control" name="fImages2">
                            </div>
                            <div class="form-group">
                                    <label>Ảnh 3</label>
                                    <input type="file" class="form-control" name="fImages3">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="number" name="txtPrice"   />
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input class="form-control" type="number"  rows="3" name="txtDiscount">
                            </div>
                            <div class="form-group">
                                <label>Currency</label>
                                <input type="text" class="form-control"  rows="3" name="txtCurrency">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="txtDesc" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea name="txtDetail" class="form-control" rows="3">

                                </textarea>
                                 <script>
                                    CKEDITOR.replace( 'txtDetail');
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Product in stock</label>
                                <input type="number" class="form-control" value="<?php echo $result['product_in_stock']; ?>" rows="3" name="txtStock">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cateId">
                                    <?php foreach ($category as $valueCate) {
                                     ?>
                                    <option
                                    value="<?php echo  $valueCate['category_id']; ?>"

                                    >
                                    <?php echo  $valueCate['category_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Feature</label>
                                <select class="form-control" name="featureId">
                                    <?php foreach ($features as $valueFeat) {
                                     ?>
                                    <option
                                    value="<?php echo  $valueFeat['feature_id']; ?>"

                                    >
                                    <?php echo  $valueFeat['feature_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control" name="brandId">
                                    <?php foreach ($brands as $valueBrand) {
                                     ?>
                                    <option
                                    value="<?php echo  $valueBrand['brand_id']; ?>"
                                    >
                                    <?php echo  $valueBrand['brand_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Origin</label>
                                <select class="form-control" name="originId">
                                    <?php foreach ($origins as $valueOrigin) {
                                     ?>
                                    <option value="<?php echo  $valueOrigin['origin_id']; ?>"

                                    >
                                    <?php echo  $valueOrigin['name_of_origin']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
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

