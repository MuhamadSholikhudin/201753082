<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Pegawai</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Pegawai
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="<?= base_url('pegawai/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Pegawai :</label>
                                        <input class="form-control" type="text" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label> Nip :</label>
                                        <input class="form-control" type="text" name="nip" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Foto : </label>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="form-group">
                                        <label> Username :</label>
                                        <input class="form-control" type="text" name="username" required>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jabatan :</label>
                                        <input class="form-control" type="text" name="jabatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Hak Akses :</label>
                                        <select class="form-control" name="hakakses" required>
                                            <option value="Admin Kepala">Admin Kepala</option>
                                            <option value="Admin TU">Admin TU</option>
                                            <option value="Admin Bidang">Admin Bidang</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input class="form-control" type="text" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('pegawai') ?>" class="btn btn-danger ">Batal</a>
                                    <button type="reset" class="btn btn-default">Reset </button>
                                </div>
                            </form>

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