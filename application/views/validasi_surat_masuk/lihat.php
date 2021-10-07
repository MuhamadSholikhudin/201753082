<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Surat Masuk</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Edit Surat masuk
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="<?= base_url('validasi_surat_masuk/aksi_validasi') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Dari :</label>
                                        <select class="form-control" name="id_instansi" required disabled>
                                            <?php foreach ($instansi as $ins) : ?>
                                                <?php if ($ins->id_instansi == $surat_masuk->id_instansi) { ?>
                                                    <option value="<?= $ins->id_instansi ?>" selected><?= $ins->nama_instansi ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $ins->id_instansi ?>"><?= $ins->nama_instansi ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>No Urut:</label>
                                        <input class="form-control" type="text" name="no_urut" value="<?= $surat_masuk->no_urut ?>" placeholder="Nomer Urut Surat Masuk" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat:</label>
                                        <input class="form-control" type="date" name="tanggal_surat" value="<?= $surat_masuk->tanggal_surat ?>" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Perihal:</label>
                                        <input class="form-control" type="text" name="perihal" value="<?= $surat_masuk->perihal ?>" placeholder="Perihal" required disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Sifat Surat :</label>
                                        <select class="form-control" name="sifat_surat" required disabled>
                                            <?php foreach ($sifat_surat as $sifat) : ?>
                                                <?php if ($sifat == $surat_masuk->sifat_surat) { ?>
                                                    <option value="<?= $sifat ?>" selected><?= $sifat ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $sifat ?>"><?= $sifat ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Isi Ringkas :</label>
                                        <textarea class="form-control" rows="3" name="isi_ringkas" required disabled><?= $surat_masuk->isi_ringkas ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Catatan :</label>
                                        <textarea class="form-control" rows="3" name="catatan" required disabled><?= $surat_masuk->catatan ?></textarea>
                                    </div>
                                    <!--  <div class="form-group">
                                        <label>File input</label>
                                        <input type="file" name="file">
                                    </div>  -->

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>No Surat Masuk :</label>
                                        <input class="form-control" type="text" name="no_suratmasuk" value="<?= $surat_masuk->no_suratmasuk ?>" required placeholder="Nomer Surat masuk" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Index :</label>
                                        <input class="form-control" placeholder="Indeks Surat" type="text" name="index" value="<?= $surat_masuk->index ?>" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diteruskan :</label>
                                        <input class="form-control" type="date" name="tanggal_teruskan" value="<?= $surat_masuk->tanggal_teruskan ?>" required disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Klasifikasi Surat :</label>
                                        <select class="form-control" name="klasifikasi_surat" required disabled>
                                            <?php foreach ($klasifikasi_surat as $klasifikasi) : ?>
                                                <?php if ($klasifikasi == $surat_masuk->klasifikasi_surat) { ?>
                                                    <option value="<?= $klasifikasi ?>" selected><?= $klasifikasi ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $klasifikasi ?>"><?= $klasifikasi ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <hr>

                                    <div class="col-lg-12">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                Validasi
                                            </div>
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <label>Validasi surat</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" <?php if ($surat_masuk->status == 4) {
                                                                                        echo "checked='checked'";
                                                                                    } else {
                                                                                    } ?> value="1" name="cek[]">Instansi Surat
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" <?php if ($surat_masuk->status == 4) {
                                                                                        echo "checked='checked'";
                                                                                    } else {
                                                                                    } ?> value="1" name="cek[]">Nomer Surat
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" <?php if ($surat_masuk->status == 4) {
                                                                                        echo "checked='checked'";
                                                                                    } else {
                                                                                    } ?> value="1" name="cek[]">Isi surat
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" <?php if ($surat_masuk->status == 4) {
                                                                                        echo "checked='checked'";
                                                                                    } else {
                                                                                    } ?> value="1" name="cek[]">tanggal surat
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Di tujukan ke :</label>
                                                    <input class="form-control" type="hidden" name="id_suratmasuk" value="<?= $surat_masuk->id_suratmasuk ?>" placeholder="Nomer Urut Surat Masuk" required>
                                                    <select class="form-control" name="teruskan_ke" required>
                                                        <?php foreach ($instansi as $ins) : ?>
                                                            <?php if ($ins->id_instansi == $surat_masuk->id_instansi) { ?>
                                                                <option value="<?= $ins->id_instansi ?>" selected><?= $ins->nama_instansi ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $ins->id_instansi ?>"><?= $ins->nama_instansi ?></option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Catatan Disposisi :</label>
                                                    <textarea class="form-control" rows="3" name="catatan_disposisi" required><?= $surat_masuk->catatan ?></textarea>
                                                </div>

                                            </div>
                                            <div class="panel-footer">

                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a href="<?= base_url('validasi_surat_masuk') ?>" class="btn btn-danger ">Batal</a>
                                            </div>
                                        </div>
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