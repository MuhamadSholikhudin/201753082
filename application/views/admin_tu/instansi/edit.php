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
                        Form Tambah instansi
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="<?= base_url('admin_tu/instansi/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama instansi :</label>
                                        <input class="form-control" type="hidden" name="id_instansi" value="<?= $instansi->id_instansi ?>">
                                        <input class="form-control" type="text" name="nama_instansi" value="<?= $instansi->nama_instansi ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label> Alamat :</label>
                                        <input class="form-control" type="text" name="alamat_instansi" value="<?= $instansi->alamat_instansi ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label> no_telp :</label>
                                        <input class="form-control" type="text" name="no_telp" value="<?= $instansi->no_telp ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label> Email :</label>
                                        <input class="form-control" type="text" name="email" value="<?= $instansi->email ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $posisi = ['internal', 'eksternal'];

                                        ?>
                                        <label>Penempatan :</label>
                                        <select class="form-control" name="posisi" required>
                                            <?php foreach ($posisi as $ins) : ?>
                                                <?php if ($ins == $instansi->posisi) { ?>
                                                    <option value="<?= $ins ?>" selected><?= $ins ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $ins ?>"><?= $ins ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                            <!-- <option value="internal">Internal</option>
                                            <option value="eksternal">Eksternal</option> -->

                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('admin_tu/instansi') ?>" class="btn btn-danger ">Batal</a>
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