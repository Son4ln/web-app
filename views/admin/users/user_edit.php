<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Permission</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <?php
                        $user = new Users();
                        $data = $user -> getUserById($id);
                     ?>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=userPermisAction" method="POST" enctype="multipart/form-data">
                            <?php echo $alert ?>
                            <input class="form-control" name="userID" type="hidden" readonly="" value="<?php echo $data['user_id']; ?>" />
                            <div class="form-group">
                                <label>Họ Và Tên</label>
                                <input class="form-control" name="txtFullName" readonly="" value="<?php echo $data['full_name']; ?>" placeholder="Nhập họ và tên" />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" readonly="" value="<?php echo $data['username']; ?>" placeholder="Nhập Username" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" readonly="" value="<?php echo $data['email']; ?>" name="txtEmail" placeholder="Nhập Email" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" class="form-control" readonly="" value="<?php echo $data['phone']; ?>" name="txtPhone" placeholder="Nhập SĐT" />
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" readonly="" value="<?php echo $data['address']; ?>" name="txtAddr" placeholder="Please Enter Your Phone" />
                            </div>
                            <div class="form-group">
                                <label>Phân quyền</label>
                                <select class="form-control" name="permis">
                                    <option value="0" <?php if($data['permission'] == 0) echo 'selected'; ?> >Super Admin</option>
                                    <option value="1" <?php if($data['permission'] == 1) echo 'selected'; ?> >Admin</option>
                                    <option value="2" <?php if($data['permission'] == 2) echo 'selected'; ?> >User</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Sửa</button>
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
