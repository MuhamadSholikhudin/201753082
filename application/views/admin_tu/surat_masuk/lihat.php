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
                        File Surat masuk
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <embed src="<?= base_url('uploads/surat_masuk/') . $surat_masuk->file ?>" width="100%" height="1000" />
                            </div>
                        </div>
                    </div>
                </div>


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
                                    <label>Tanggal Diteruskan :</label>
                                    <input class="form-control" type="date" name="tanggal_teruskan" readonly value="<?= $surat_masuk->tanggal_teruskan ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Klasifikasi Surat :</label>
                                    <select class="form-control" name="id_klasifikas" readonly required>
                                        <?php foreach ($klasifikasi as $kla) : ?>
                                            <?php if ($kla->id_klasifikasi == $surat_masuk->klasifikasi_surat) { ?>
                                                <option value="<?= $kla->id_klasifikasi ?>" selected><?= $kla->klasifikasi ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $kla->id_klasifikasi ?>"><?= $kla->klasifikasi ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php
                                $cari_join_disposisi = $this->db->query("SELECT surat_masuk.status as status_surat, disposisi.status as status_disposisi , disposisi.id_user as id_user FROM surat_masuk JOIN disposisi ON surat_masuk.id_suratmasuk = disposisi.id_suratmasuk WHERE  surat_masuk.id_suratmasuk = $surat_masuk->id_suratmasuk ");
                                if ($cari_join_disposisi->num_rows() > 0) {
                                    $tampil_join_disposisi = $cari_join_disposisi->row();
                                ?>

                                    <div class="form-group">
                                        <label>Di tujukan ke : </label>
                                        <select class="form-control" readonly required>
                                            <?php foreach ($terus as $ins) : ?>
                                                <?php if ($ins->id_user == $tampil_join_disposisi->id_user) { ?>
                                                    <option value="<?= $ins->id_user ?>" selected><?= $ins->username ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $ins->id_user ?>"><?= $ins->username ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                <?php } else {
                                }

                                ?>


                                <a href="<?= base_url('admin_tu/surat_masuk') ?>" class="btn btn-danger ">Kembali</a>
                                <hr>
                                *Keterangan :

                                <?php
                                $cari_join_disposisi = $this->db->query("SELECT surat_masuk.status as status_surat, disposisi.status as status_disposisi FROM surat_masuk JOIN disposisi ON surat_masuk.id_suratmasuk = disposisi.id_suratmasuk WHERE  surat_masuk.id_suratmasuk = $surat_masuk->id_suratmasuk ");
                                if ($cari_join_disposisi->num_rows() > 0) {
                                    $tampil_join_disposisi = $cari_join_disposisi->row();
                                    if ($tampil_join_disposisi->status_surat == 5) {
                                        echo "Surat Sudah di validasi dan telah di baca oleh instansi terkait";
                                    } elseif ($tampil_join_disposisi->status_surat == 4) {
                                        echo "Surat Sudah di validasi dan belum di baca oleh instansi terkait";
                                    } elseif ($tampil_join_disposisi->status_surat == 3) {
                                        echo "Surat Sudah di baca oleh ketua pelaksana";
                                    } elseif ($tampil_join_disposisi->status_surat == 2) {
                                        echo "Surat Sudah di terkirim ke ketua pelaksana";
                                    } elseif ($tampil_join_disposisi->status_surat == 1) {
                                        echo "Surat di kembalikan oleh kepala pelaksana";
                                    } elseif ($tampil_join_disposisi->status_surat == 0) {
                                        echo "Surat baru di data ";
                                    }
                                } else {
                                    $cari_surat = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $surat_masuk->id_suratmasuk ")->row();
                                    if ($cari_surat->status == 3) {
                                        echo "Surat Sudah di baca oleh ketua pelaksana";
                                    } elseif ($cari_surat->status == 2) {
                                        echo "Surat Sudah di terkirim ke ketua pelaksana";
                                    } elseif ($cari_surat->status == 1) {
                                        echo "Surat di kembalikan oleh kepala pelaksana";
                                    } elseif ($cari_surat->status == 0) {
                                        echo "Surat baru di data ";
                                    }
                                }

                                ?>

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