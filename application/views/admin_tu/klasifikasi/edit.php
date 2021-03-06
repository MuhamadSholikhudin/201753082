<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Surat Masuk</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Surat masuk
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="<?= base_url('admin_tu/klasifikasi/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>No Klasifikasi :</label>
                                        <input class="form-control" type="hidden" name="id_klasifikasi" value="<?= $klasifikasi->id_klasifikasi ?>">
                                        <input class="form-control" type="text" name="no_klasifikasi" value="<?= $klasifikasi->no_klasifikasi ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Klasifikasi :</label>
                                        <input class="form-control" type="text" name="klasifikasi" value="<?= $klasifikasi->klasifikasi ?>" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('admin_tu/klasifikasi') ?>" class="btn btn-danger ">Batal</a>
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