<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah instansi</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah instansi
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="<?= base_url('instansi/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama instansi :</label>
                                        <input class="form-control" type="text" name="nama_instansi" placeholder="Nama Instansi" required>
                                    </div>
                                    <div class="form-group">
                                        <label> Alamat :</label>
                                        <input class="form-control" type="text" name="alamat_instansi" placeholder="Alamat Instansi" required>
                                    </div>


                                    <div class="form-group">
                                        <label> No Telephone :</label>
                                        <input class="form-control" type="text" name="no_telp" placeholder="Nomer Telephone" required>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('instansi') ?>" class="btn btn-danger ">Batal</a>
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