<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lihat Surat Masuk</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Lihat Surat masuk
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Dari :</label>
                                    <input class="form-control" type="hidden" name="id_suratmasuk" value="<?= $surat_masuk->id_suratmasuk ?>" placeholder="Nomer Urut Surat Masuk" required>
                                    <select class="form-control" name="id_instansi" required readonly>
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
                                    <input class="form-control" type="text" name="no_urut" value="<?= $surat_masuk->no_urut ?>" placeholder="Nomer Urut Surat Masuk" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat:</label>
                                    <input class="form-control" type="date" name="tanggal_surat" value="<?= $surat_masuk->tanggal_surat ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Perihal:</label>
                                    <input class="form-control" type="text" name="perihal" value="<?= $surat_masuk->perihal ?>" placeholder="Perihal" readonly required>
                                </div>

                                <div class="form-group">
                                    <label>Sifat Surat :</label>
                                    <select class="form-control" name="sifat_surat" readonly required>
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
                                    <textarea class="form-control" rows="3" name="isi_ringkas" readonly required><?= $surat_masuk->isi_ringkas ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Catatan :</label>
                                    <textarea class="form-control" rows="3" name="catatan" readonly required><?= $surat_masuk->catatan ?></textarea>
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
                                    <input class="form-control" type="text" name="no_suratmasuk" readonly value="<?= $surat_masuk->no_suratmasuk ?>" required placeholder="Nomer Surat masuk">
                                </div>
                                <div class="form-group">
                                    <label>Index :</label>
                                    <input class="form-control" placeholder="Indeks Surat" type="text" name="index" readonly value="<?= $surat_masuk->index ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Diteruskan :</label>
                                    <input class="form-control" type="date" name="tanggal_teruskan" readonly value="<?= $surat_masuk->tanggal_teruskan ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Klasifikasi Surat :</label>
                                    <select class="form-control" name="klasifikasi_surat" readonly required>
                                        <?php foreach ($klasifikasi_surat as $klasifikasi) : ?>
                                            <?php if ($klasifikasi == $surat_masuk->klasifikasi_surat) { ?>
                                                <option value="<?= $klasifikasi ?>" selected><?= $klasifikasi ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $klasifikasi ?>"><?= $klasifikasi ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Diteruskan Kepada :</label>
                                    <?php 
        $cari_disposisi = $this->db->query("SELECT * FROM  disposisi WHERE  disposisi.teruskan_ke = $surat_masuk->id_suratmasuk ")->row();
        $cari_orang = $this->db->query("SELECT * FROM  user WHERE  id_user = $cari_disposisi->teruskan_ke ")->row();
                                    

                                    ?>
                                    <input class="form-control" type="text" name="tanggal_teruskan" readonly value="<?=  $cari_orang->jabatan .' / '. $cari_orang->nama ?>" required>
                                </div>

                                <a href="<?= base_url('surat_masuk') ?>" class="btn btn-danger ">Batal</a>

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