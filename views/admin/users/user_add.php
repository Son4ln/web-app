<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=userAddAction" method="POST" enctype="multipart/form-data">
                            <?php echo $alert ?>
                            <div class="form-group">
                                <label>Họ Và Tên</label>
                                <input class="form-control" name="txtFullName" placeholder="Nhập họ và tên" />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" placeholder="Nhập Username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Nhập Password"/>
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Xác nhận password"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Nhập Email" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" class="form-control" name="txtPhone" placeholder="Nhập SĐT" />
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="txtAddr" placeholder="Please Enter Your Phone" />
                            </div>
                            <div class="form-group">
                                <label>Hình đại diện</label>
                                <input type="file" class="form-control" name="txtAva"/>
                            </div>

                            <div class="form-group">
                                <label>Phân quyền</label>
                                <select class="form-control" name="permis">
                                    <option value="0">Super Admin</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>

                            <button type="submit" name="uploadclick" class="btn btn-primary">Thêm</button>
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
