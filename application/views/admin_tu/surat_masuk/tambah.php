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
                            <form role="form" action="<?= base_url('admin_tu/surat_masuk/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="form-group">
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
                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>" required>

                                        <label>Dari :</label>
                                        <select class="form-control" name="id_instansi" required>
                                            <?php foreach ($instansi as $ins) : ?>
                                                <option value="<?= $ins->id_instansi ?>"><?= $ins->nama_instansi ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
<?php
$n_id_suratmasuk = $this->db->query("SELECT id_suratmasuk FROM surat_masuk ORDER BY id_suratmasuk DESC LIMIT 1")->row();
// echo $n_id_suratmasuk->id_suratmasuk;
?>
                                    <div class="form-group">
                                        <label>No Urut:</label>
                                        <input class="form-control" type="text"  value="<?= $n_id_suratmasuk->id_suratmasuk; ?>" readonly>
                                        <input class="form-control" type="hidden" name="no_urut" value="<?= $n_id_suratmasuk->id_suratmasuk; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat:</label>
                                        <input class="form-control" type="date" name="tanggal_surat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Perihal:</label>
                                        <input class="form-control" type="text" name="perihal" placeholder="Perihal" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Sifat Surat :</label>
                                        <select class="form-control" name="sifat_surat" required>
                                            <option value="Penting">Penting</option>
                                            <option value="Biasa">Biasa</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Isi Ringkas :</label>
                                        <textarea class="form-control" rows="3" name="isi_ringkas" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Catatan :</label>
                                        <textarea class="form-control" rows="3" name="catatan" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File Surat Masuk</label>
                                        <input type="file" name="file" accept="application/pdf, image/x-eps">
                                    </div>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>No Surat Masuk :</label>
                                        <input class="form-control" type="text" name="no_suratmasuk" required placeholder="Nomer Surat masuk">
                                    </div>
                                    <!--                                   <div class="form-group">
                                        <label>Index :</label>
                                        <input class="form-control" placeholder="Indeks Surat" type="text" name="index" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Tanggal Diteruskan :</label>
                                        <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" name="tanggal_teruskan" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Klasifikasi Surat :</label>
                                        <select class="form-control" name="id_klasifikasi" required>
                                            <?php foreach ($klasifikasi as $ins) : ?>
                                                <option value="<?= $ins->id_klasifikasi ?>"><?= $ins->klasifikasi ?></option>
                                            <?php endforeach; ?>
                                            <!--
  <option value="Umum">Umum</option>
                                            <option value="Pemerintahan">Pemerintahan</option>
-->
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('admin_tu/surat_masuk') ?>" class="btn btn-danger ">Batal</a>
                                    <button type="reset" class="btn btn-default">Reset </button>
                            </form>
                        </div>

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
