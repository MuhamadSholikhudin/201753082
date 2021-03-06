<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

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
                        <form role="form" action="<?= base_url('admin_kepala/validasi_surat_masuk/aksi_validasi') ?>" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
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
                                </div>

                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>No Surat Masuk :</label>
                                    <input class="form-control" type="text" name="no_suratmasuk" value="<?= $surat_masuk->no_suratmasuk ?>" required placeholder="Nomer Surat masuk" disabled>
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
                                            <?php
                                            $id_user = $this->session->userdata('id_user');
                                            if ($this->session->userdata('hakakses') == 'Admin TU') {
                                                $cari_pengguna = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE id_user = $id_user ")->row();
                                                $id_pengguna = $cari_pengguna->id_sub_umum_pegawai;
                                            } elseif ($this->session->userdata('hakakses') == 'Admin Kepala') {
                                                $cari_pengguna = $this->db->query("SELECT * FROM kepala_pelaksana WHERE id_user = $id_user")->row();
                                                $id_pengguna = $cari_pengguna->id_kepala_pelaksana;
                                            } elseif ($this->session->userdata('hakakses') == 'Admin Bidang') {
                                                $cari_pengguna = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $id_user")->row();
                                                $id_pengguna = $cari_pengguna->id_kepala_bidang;
                                            } else {
                                                redirect('auth/logout');
                                            }
                                            ?>

                                            <input class="form-control" type="hidden" name="id_suratmasuk" value="<?= $surat_masuk->id_suratmasuk ?>" required>
                                            <input class="form-control" type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>" required>
                                            <div class="form-group">
                                                <label>Validasi surat</label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php if ($surat_masuk->status >= 4) {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?> value="1" name="cek[]" disabled>Instansi Surat
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php if ($surat_masuk->status >= 4) {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?> value="1" name="cek[]" disabled>Nomer Surat
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php if ($surat_masuk->status >= 4) {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?> value="1" name="cek[]" disabled>Isi surat
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php if ($surat_masuk->status >= 4) {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?> value="1" name="cek[]" disabled>tanggal surat
                                                    </label>
                                                </div>
                                            </div>
                                            <?php

                                            $disposisi = $this->db->query("SELECT * FROM disposisi WHERE id_suratmasuk = $surat_masuk->id_suratmasuk ");
                                            if ($disposisi->num_rows() > 0) {
                                                $tampil_disposisi = $disposisi->row();

                                                $terus_kan = $tampil_disposisi->id_user;
                                                $disposisi_catatan = $tampil_disposisi->catatan;
                                            } else {
                                                $terus_kan = 1;
                                                $disposisi_catatan = "";
                                            }
                                            ?>

                                            <div class="form-group">
                                                <label>Di tujukan ke : </label>
                                                <select class="form-control" name="teruskan_ke" disabled required>
                                                    <?php foreach ($terus as $ins) : ?>
                                                        <?php if ($ins->id_user == $terus_kan) { ?>
                                                            <option value="<?= $ins->id_user ?>" selected><?= $ins->username ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $ins->id_user ?>"><?= $ins->username ?></option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Catatan Disposisi :</label>
                                                <textarea class="form-control" rows="3" name="catatan_disposisi" disabled required><?= $disposisi_catatan ?></textarea>
                                            </div>

                                        </div>
                                        <div class="panel-footer">

                                            <a href="<?= base_url('admin_kepala/validasi_surat_masuk') ?>" class="btn btn-danger ">Kembali</a>
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