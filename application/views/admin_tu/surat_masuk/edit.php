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
                        Form Edit Surat masuk
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="<?= base_url('admin_tu/surat_masuk/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Dari :</label>
                                        <input class="form-control" type="hidden" name="id_suratmasuk" value="<?= $surat_masuk->id_suratmasuk ?>" required>
                                        <?php
                                        $id_user = $this->session->userdata('id_user');
                                        if ($this->session->userdata('hakakses') == 'Admin TU') {
                                            $cari_pengguna = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE id_user = $id_user ")->row();
                                            $id_pengguna = $cari_pengguna->id_sub_umum_pegawai;
                                        } elseif ($this->session->userdata('hakakses') == 'Admin Kepala') {
                                            $cari_pengguna = $this->db->query("SELECT * FROM kepala_pelaksan WHERE id_user = $id_user")->row();
                                            $id_pengguna = $cari_pengguna->id_kepala_pelaksana;
                                        } elseif ($this->session->userdata('hakakses') == 'Admin Bidang') {
                                            $cari_pengguna = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $id_user")->row();
                                            $id_pengguna = $cari_pengguna->id_kepala_bidang;
                                        } else {
                                            redirect('auth/logout');
                                        }
                                        ?>
                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>">
                                        <select class="form-control" name="id_instansi" required>
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
                                        <input class="form-control" type="text" name="no_urut" value="<?= $surat_masuk->no_urut ?>" placeholder="Nomer Urut Surat Masuk" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat:</label>
                                        <input class="form-control" type="date" name="tanggal_surat" value="<?= $surat_masuk->tanggal_surat ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Perihal:</label>
                                        <input class="form-control" type="text" name="perihal" value="<?= $surat_masuk->perihal ?>" placeholder="Perihal" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Sifat Surat :</label>
                                        <select class="form-control" name="sifat_surat" required>
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
                                        <textarea class="form-control" rows="3" name="isi_ringkas" required><?= $surat_masuk->isi_ringkas ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Catatan :</label>
                                        <textarea class="form-control" rows="3" name="catatan" required><?= $surat_masuk->catatan ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File Surat masuk</label>
                                        <input type="file" name="file" accept="application/pdf" required>
                                    </div>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>No Surat Masuk :</label>
                                        <input class="form-control" type="text" name="no_suratmasuk" value="<?= $surat_masuk->no_suratmasuk ?>" required placeholder="Nomer Surat masuk">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Index :</label>
                                        <input class="form-control" placeholder="Indeks Surat" type="text" name="index" value="<?= $surat_masuk->index ?>" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Tanggal Diteruskan :</label>
                                        <input class="form-control" type="date" name="tanggal_teruskan" value="<?= $surat_masuk->tanggal_teruskan ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Klasifikasi Surat :

                                        </label>
                                        <select class="form-control" name="id_klasifikasi" required>
                                            <?php foreach ($klasifikasi as $kla) : ?>
                                                <?php if ($kla->id_klasifikasi == $surat_masuk->id_klasifikasi) { ?>
                                                    <option value="<?= $kla->id_klasifikasi ?>" selected><?= $kla->klasifikasi ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $kla->id_klasifikasi ?>"><?= $kla->klasifikasi ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('admin_tu/surat_masuk') ?>" class="btn btn-danger ">Batal</a>
                                    <button type="reset" class="btn btn-default">Reset </button>
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