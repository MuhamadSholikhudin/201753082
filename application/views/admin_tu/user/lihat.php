<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit user</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Edit user
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama user :</label>
                                    <input class="form-control" type="hidden" name="id_user" value="<?= $t_user->id_user ?>" required disabled>
                                    <input class="form-control" type="hidden" name="hakakses" value="<?= $t_user->hakakses ?>" required disabled>
                                    <input class="form-control" type="text" name="nama" value="<?= $user->nama ?>" required disabled>
                                </div>
                                <div class="form-group">
                                    <label> Nip :</label>
                                    <input class="form-control" type="text" name="nip" value="<?= $user->nip ?>" required disabled>
                                </div>

                                <div class="form-group">
                                    <label>Foto : </label>
                                    <img src="<?= base_url('uploads/foto/') . $user->foto ?>" alt="" width="100" disabled>
                                </div>
                                <script>
                                    // alert('ok');
                                </script>
                                <div class=" form-group">
                                    <label> Username :</label>
                                    <input class="form-control" type="text" name="username" value="<?= $t_user->username ?>" required disabled>
                                </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jabatan :</label>
                                    <input class="form-control" type="text" name="jabatan" value="<?= $user->jabatan ?>" required disabled>
                                </div>
                                <!-- <div class="form-group">
                                        <label>Hak Akses :</label>
                                        <select class="form-control" name="hakakses">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div> -->
                                <!-- <br>
                                    <br>
                                    <br> -->

                                <div class="form-group">
                                    <label>Password :</label>
                                    <input class="form-control" type="text" name="password" value="<?= $t_user->password ?>" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Status :</label>
                                    <select class="form-control" name="status" required disabled>
                                        <?php foreach ($status as $sta) : ?>
                                            <?php if ($sta == $t_user->status) { ?>
                                                <option value="<?= $sta ?>" selected>
                                                    <?php if ($sta == 1) {  ?>
                                                        Aktif
                                                    <?php } else { ?>
                                                        Tidak Aktif
                                                    <?php
                                                    } ?>
                                                </option>
                                            <?php } else { ?>
                                                <option value="<?= $sta ?>">
                                                    <?php if ($sta == 1) {  ?>
                                                        Aktif
                                                    <?php } else { ?>
                                                        Tidak Aktif
                                                    <?php
                                                    } ?>
                                                </option>
                                            <?php } ?>
                                        <?php endforeach ?>

                                    </select>
                                </div>
                                <a href="<?= base_url('admin_tu/user') ?>" class="btn btn-danger ">Kembali</a>
                            </div>

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->