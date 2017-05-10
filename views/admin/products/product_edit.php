<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <?php
                            $products = new Products();
                            $result = $products -> getProductById($id);
                            $cate = new Categories();
                            $category = $cate -> getCategories();
                            $feature = new Features();
                            $features = $feature -> getFeatures();
                            $brand = new Brands();
                            $brands = $brand -> getBrands();
                            $origin = new Origin();
                            $origins = $origin -> getOrigin();
                        ?>
                        <form action="?action=productEditAction" method="POST" enctype="multipart/form-data">
                        <input class="form-control" type="hidden" name="prodId" value="<?php echo $result['product_id']; ?>" />
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" value="<?php echo $result['product_name']; ?>" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Ảnh 1</label>
                                        <input type="file" name="fImages1">
                                        <input type="hidden" value="<?php echo $result['product_image']; ?>" name="oldImages1">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ảnh cũ 1</label>
                                        <img src="public/client/images/product/<?php echo $result['product_image']; ?>" width="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Ảnh 2</label>
                                        <input type="file" name="fImages2">
                                        <input type="hidden" value="<?php echo $result['product_image1']; ?>" name="oldImages2">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ảnh cũ 2</label>
                                        <img src="public/client/images/product/<?php echo $result['product_image1']; ?>" width="100">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Ảnh 3</label>
                                        <input type="file" name="fImages3">
                                        <input type="hidden" value="<?php echo $result['product_image2']; ?>" name="oldImages3">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ảnh cũ 3</label>
                                        <img src="public/client/images/product/<?php echo $result['product_image2']; ?>" width="100">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="number" name="txtPrice" value="<?php echo $result['product_price']; ?>"  />
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input class="form-control" type="number" value="<?php echo $result['product_discount']; ?>" rows="3" name="txtDiscount">
                            </div>
                            <div class="form-group">
                                <label>Currency</label>
                                <input type="text" class="form-control" value="<?php echo $result['product_currency']; ?>" rows="3" name="txtCurrency">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="txtDesc" ><?php echo $result['product_description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea name="txtDetail" class="form-control" rows="3">
                                    <?php echo $result['product_detail']; ?>
                                </textarea>
                                <script type="text/javascript">CKEDITOR.replace( 'txtDetail');</script>
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
                                        <?php
                                            selected($result['category_id'], $valueCate['category_id']);
                                        ?>
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
                                        <?php
                                            selected($result['feature_id'], $valueFeat['feature_id']);
                                        ?>
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
                                        <?php
                                            selected($result['brand_id'], $valueBrand['brand_id']);
                                        ?>
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
                                        <?php
                                            selected($result['origin_id'], $valueOrigin['origin_id']);
                                        ?>
                                    >
                                    <?php echo  $valueOrigin['name_of_origin']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Product Edit</button>
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
