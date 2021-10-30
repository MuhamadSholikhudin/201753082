<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lihat Surat Keluar</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Surat Keluar
                    </div>

                    <div class="panel-body">
                        <div class="card p-4">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="<?= base_url('assets/img/logobpbdpati.png') ?>" alt="" width="270">
                                    </div>
                                    <div class="col-md-10">
                                        <h3 class="text-center">PEMERINTAH KABUPATEN PATI</h3>
                                        <h3 class="text-center">BADAN PENANGGULANGAN BENCANA DAERAH</h3>
                                        <h5 class="text-center">Jln. Raya Pati Kudus KM 3,5 Margorej- Pati No.99 Telp. .(0291) 438691, 431470, Fax (0291) 438691</h5>
                                        <h3 class="text-center">PATI 59322</h3>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <h4> Pati, <?= $surat_keluar->tanggal_surat ?> </h4>
                                        </div>
                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> Nomor &nbsp;&nbsp;&nbsp; : <?= $surat_keluar->no_suratkeluar ?></div> <br>
                                            <!-- <div class="col-sm-12 lead"> Lampiran : </div> <br> -->
                                            <div class="col-sm-12 lead"> Perihal &nbsp;&nbsp;&nbsp; : <?= $surat_keluar->perihal ?></div> <br>
                                        </div>

                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div>
                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div>

                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> Kepada </div> <br>
                                            <div class="col-sm-12 lead">
                                                <!-- <?= $surat_keluar->id_instansi ?> -->
                                                <?php
                                                $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $surat_keluar->id_instansi ")->row();
                                                echo $cari_instansi->nama_instansi
                                                ?>
                                            </div> <br>
                                            <div class="col-sm-12 lead"> <?= $cari_instansi->alamat_instansi ?> </div> <br>
                                            <div class="col-sm-12 lead"> <?= $cari_instansi->kota ?> </div> <br>
                                        </div>


                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div>
                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div>


                                        <div class="col-sm-12 lead">
                                            <textarea class="form" rows="15" style=" border: none; background-color: transparent; resize: none; outline: none;">
                                                <?= $surat_keluar->isi_ringkas ?>
                                            </textarea>

                                        </div>

                                        <div class="col-sm-8">
                                            <div class="content-bottom">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <a href="<?= base_url('admin_bidang/surat_keluar') ?>" class="btn btn-success">Kembali </a>

                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div>
                                                <h4 class="text-center">Kudus, <?= date('d-m-Y') ?> </h4>
                                                <h4 class="text-center">Kepala Pelaksana BPBD Pati</h4>
                                            </div>
                                            <div class="mb-3">
                                                <br>
                                                <h4 class="text-center">Telah Disetujui</h4><br>
                                            </div>
                                            <div>
                                                <?php
                                                // $id_user = $this->session->userdata('id_user');
                                                $c_setujui = $this->db->query("SELECT * FROM kepala_pelaksana JOIN setujui ON kepala_pelaksana.id_kepala_pelaksana = setujui.id_kepala_pelaksana WHERE setujui.id_suratkeluar =  $surat_keluar->id_suratkeluar");
                                                if ($c_setujui->num_rows() < 1) { ?>
                                                    <h4 class="text-center"><u></u> </h4>
                                                    <h4 class="text-center">NIP : </h4>
                                                <?php } else {
                                                    $cek_kepala = $c_setujui->row(); ?>
                                                    <h4 class="text-center"><u><?= $cek_kepala->nama ?></u> </h4>
                                                    <h4 class="text-center">NIP : <?= $cek_kepala->nip ?></h4>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>


                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Setujui Surat Keluar
                    </div>

                    <div class="panel-body">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kepada :</label>
                                    <select class="form-control" name="id_instansi" required disabled>
                                        <?php foreach ($instansi as $ins) : ?>
                                            <?php if ($ins->id_instansi == $surat_keluar->id_instansi) { ?>
                                                <option value="<?= $ins->id_instansi ?>" selected><?= $ins->nama_instansi ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $ins->id_instansi ?>"><?= $ins->nama_instansi ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>No Urut:</label>
                                    <input class="form-control" type="text" name="no_urut" value="<?= $surat_keluar->no_urut ?>" placeholder="Nomer Urut Surat Masuk" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat:</label>
                                    <input class="form-control" type="date" name="tanggal_surat" value="<?= $surat_keluar->tanggal_surat ?>" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Perihal:</label>
                                    <input class="form-control" type="text" name="perihal" value="<?= $surat_keluar->perihal ?>" placeholder="Perihal" required disabled>
                                </div>

                                <div class="form-group">
                                    <label>Sifat Surat :</label>
                                    <select class="form-control" name="sifat_surat" required disabled>
                                        <?php foreach ($sifat_surat as $sifat) : ?>
                                            <?php if ($sifat == $surat_keluar->sifat_surat) { ?>
                                                <option value="<?= $sifat ?>" selected><?= $sifat ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $sifat ?>"><?= $sifat ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Isi Ringkas :</label>
                                    <textarea class="form-control" rows="3" name="isi_ringkas" required disabled><?= $surat_keluar->isi_ringkas ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Catatan :</label>
                                    <textarea class="form-control" rows="3" name="catatan" required disabled><?= $surat_keluar->catatan ?></textarea>
                                </div>
                                *Keterangan :
                                <?php
                                $cari_join_setujui = $this->db->query("SELECT surat_keluar.status as status_surat, setujui.status as status_setujui FROM surat_keluar JOIN setujui ON surat_keluar.id_suratkeluar = setujui.id_suratkeluar WHERE  surat_keluar.id_suratkeluar = $surat_keluar->id_suratkeluar ");
                                if ($cari_join_setujui->num_rows() > 0) {
                                    $tampil_join_setujui = $cari_join_setujui->row();
                                    if ($tampil_join_setujui->status_surat == 5) {
                                        echo "Surat Sudah di Setujui dan telah di baca oleh instansi terkait";
                                    } elseif ($tampil_join_setujui->status_surat == 4) {
                                        echo "Surat Sudah di Setujui dan belum di baca oleh instansi terkait";
                                    } elseif ($tampil_join_setujui->status_surat == 3) {
                                        echo "Surat Sudah di baca oleh ketua pelaksana";
                                    } elseif ($tampil_join_setujui->status_surat == 2) {
                                        echo "Surat Sudah di terkirim ke ketua pelaksana";
                                    } elseif ($tampil_join_setujui->status_surat == 1) {
                                        echo "Surat di kembalikan oleh kepala pelaksana";
                                    } elseif ($tampil_join_setujui->status_surat == 0) {
                                        echo "Surat baru di data ";
                                    }
                                } else {
                                    $cari_surat = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $surat_keluar->id_suratkeluar ")->row();
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
                                <!--      <div class="form-group">
                                        <label>File input</label>
                                        <input type="file" name="file">
                                    </div>  
-->
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>No Surat Keluar :</label>
                                    <input class="form-control" type="text" name="no_suratkeluar" value="<?= $surat_keluar->no_suratkeluar ?>" required placeholder="Nomer Surat masuk" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Diteruskan :</label>
                                    <input class="form-control" type="date" name="tanggal_teruskan" value="<?= $surat_keluar->tanggal_teruskan ?>" required disabled>
                                </div>

                                <div class="form-group">
                                    <label>Klasifikasi Surat :</label>
                                    <select class="form-control" name="klasifikasi_surat" required disabled>
                                        <?php foreach ($klasifikasi as $kla) : ?>
                                            <?php if ($klasifikasi == $surat_keluar->id_klasifikasi) { ?>
                                                <option value="<?= $kla->id_klasifikasi ?>" selected><?= $kla->klasifikasi ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $kla->id_klasifikasi ?>"><?= $kla->klasifikasi ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <hr>

                                <div class="col-lg-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            Persetujuan Surat Keluar
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
                                            <input class="form-control" type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>" required>
                                            <input class="form-control" type="hidden" name="id_suratkeluar" value="<?= $surat_keluar->id_suratkeluar ?>" required>

                                            <div class="form-group">
                                                <label>Persetujuan Surat</label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php if ($surat_keluar->status >= 4) {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?> value="1" name="cek[]" disabled>Instansi Tujuan
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php if ($surat_keluar->status >= 4) {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?> value="1" name="cek[]" disabled>Isi surat
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php if ($surat_keluar->status >= 4) {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?> value="1" name="cek[]" disabled>tanggal surat
                                                    </label>
                                                </div>
                                            </div>
                                            <?php

                                            $setujui = $this->db->query("SELECT * FROM setujui WHERE id_suratkeluar = $surat_keluar->id_suratkeluar ");
                                            if ($setujui->num_rows() > 0) {
                                                $tampil_setujui = $setujui->row();
                                                $setujui_catatan = $tampil_setujui->catatan;
                                            } else {
                                                $setujui_catatan = "";
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label>Catatan Setujui :</label>
                                                <textarea class="form-control" rows="3" name="catatan_setujui" disabled required><?= $setujui_catatan ?></textarea>
                                            </div>

                                        </div>
                                        <div class="panel-footer">

                                            <a href="<?= base_url('admin_bidang/surat_keluar') ?>" class="btn btn-danger ">Kembali</a>
                                        </div>
                                    </div>
                                </div>

                                <!--   /.col-lg-6 (nested) -->
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
