<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Họ tên</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Quyền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                                $user = new Users();
                                $data = $user -> getUsers();
                                 foreach ($data as $key) {
                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['full_name']; ?></td>
                                <td><?php echo $key['username']; ?></td>
                                <td><?php echo $key['email']; ?></td>
                                <td><?php echo $key['phone']; ?></td>
                                <td><?php echo $key['address']; ?></td>
                                <td><?php if($key['permission'] == 0){
                                        echo "Super Admin";
                                    }elseif ($key['permission'] == 1) {
                                        echo "Admin";
                                    }else
                                    {
                                        echo "User";
                                    }
                                    ?>
                                </td>
                                <td><i class="fa fa-trash-o  fa-fw" ></i><a onclick="return delConfirm ('Bạn có chắc muốn xóa User này');" href="?action=delUser&id=<?php echo $key['user_id']; ?>"> Delete</a> |
                                <i class="fa fa-pencil fa-fw"></i> <a href="?action=userEdit&id=<?php echo $key['user_id']; ?>">Permission</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>
