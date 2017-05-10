<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Châm Ngôn
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
                                <th>ID</th>
                                <th>Châm Ngôn</th>
                                <th>Background</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $list = new Maxim();
                                $data = $list -> getMaxim();
                                foreach ($data as $key) {

                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $key['maxim_id']; ?></td>
                                <td style="max-width: 300px"><?php echo $key['maxim_content']; ?></td>

                                <td><?php if($key['maxim_background'] == 'border-box'){
                                        echo "Nền tròn , trắng";
                                    }else if ($key['maxim_background'] == 'no-border'){
                                        echo "Không nền , không viền";
                                    }else if ($key['maxim_background'] == 'border-box-right') {
                                        echo "Không nền, viền vuông dạng chấm đỏ";
                                    }
                                    ?></td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return delConfirm('Bạn có chắc muốn xóa châm ngôn này')" href="?action=delMaxim&id=<?php echo $key['maxim_id']; ?>"> Delete</a> <br/><hr style="margin: 5px" /> <i class="fa fa-pencil fa-fw"></i> <a href="?action=editMaxim&id=<?php echo $key['maxim_id']; ?>">Edit</a></td>
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
