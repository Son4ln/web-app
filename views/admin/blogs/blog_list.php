<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blogs
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>

                    <?php
                        $blog = new Blogs();
                        $data = $blog -> getBlogs ();
                    ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu Đề</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Thao Tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key) {
                             ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['blog_id']; ?></td>
                                <td><?php echo $key['blog_title']; ?></td>
                                <td><img src="public/client/images/blog/<?php echo $key['featured_image']; ?>" width="100px"></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa Brand này. Toàn bộ sản phẩm liên quan cũng sẽ bị xóa')" href="?action=blogDel&id=<?php echo $key['blog_id']; ?>"> Delete</a> <br/><hr style="margin: 5px" /> <i class="fa fa-pencil fa-fw"></i> <a href="?action=blogEdit&id=<?php echo $key['blog_id']; ?>">Edit and Detail</a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
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