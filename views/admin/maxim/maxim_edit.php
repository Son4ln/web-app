<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Châm Ngôn
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=editMaximAction" method="POST" enctype="multipart/form-data">
                            <?php
                                $maxim = new Maxim();
                                $data = $maxim -> getMaximById($id);
                             ?>
                            <input type="hidden" name="mId" value="<?php echo $data['maxim_id']; ?>"  class="form-control">

                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="mContent" class="form-control"><?php echo $data['maxim_content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Background</label>
                                <select name="mbackground" class="form-control">
                                    <option value="border-box" <?php
                                        selected($data['maxim_background'], 'border-box');
                                     ?>>
                                         Nền tròn , trắng
                                     </option>
                                    <option value="no-border"
                                        <?php
                                            selected($data['maxim_background'], 'no-border');
                                         ?>
                                    >
                                        Không nền , không viền
                                    </option>
                                    <option value="border-box-right"
                                    <?php
                                        selected($data['maxim_background'], 'border-box-right');
                                     ?>
                                    >
                                        Không nền, viền vuông dạng chấm đỏ
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa Châm Ngôn</button>
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
