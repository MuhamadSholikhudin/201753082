<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Pegawai</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Edit Pegawai
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="<?= base_url('pegawai/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Pegawai :</label>
                                        <input class="form-control" type="hidden" name="id_pegawai" value="<?= $pegawai->id_pegawai ?>">
                                        <input class="form-control" type="text" name="nama" value="<?= $pegawai->nama ?>">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label> Nip :</label>
                                        <input class="form-control" type="text" name="nip" value="<?= $pegawai->nip ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Foto : </label>

                                        <input type="file" id='' name="foto">
                                    </div>
                                    <script>
                                        // alert('ok');
                                    </script>
                                    <div class="form-group">
                                        <label> Username :</label>
                                        <input class="form-control" type="text" name="username" value="<?= $pegawai->username ?>">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jabatan :</label>
                                        <input class="form-control" type="text" name="jabatan" value="<?= $pegawai->jabatan ?>">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Hak Akses :</label>
                                        <select class="form-control" name="hakakses">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input class="form-control" type="text" name="password" value="<?= $pegawai->password ?>">
                                        <p class="help-block">Example block-level help text here.</p>
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