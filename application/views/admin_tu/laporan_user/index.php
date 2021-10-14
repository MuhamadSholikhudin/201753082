<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan User</h1>
            </div>


            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Laporan User
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h3>Tampilkan user</h3>
                                <form role="form" action="<?= base_url('admin_tu/laporan_user') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih</label>
                                        <select class="form-control" name="hakakses" required>
                                            <option value="semua">Semua</option>
                                            <option value="Admin Kepala">Kepala Pelaksana</option>
                                            <option value="Admin TU">Sub umum dan pegawai</option>
                                            <option value="Admin Bidang">Kepala Bidang</option>

                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>
                            </div>

                        </div>


                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <div class="col-lg-12">


                <div class="card">
                    <div class="header">
                        <img class="rounded center-block d-block" src="<?= base_url('assets/img/logobpbdpati.png') ?>" width="200" alt="" srcset="">
                        <h4 class="text-center">
                            BPBD KABUPATEN PATI

                        </h4>
                        <h6 class="text-center">
                            Alamat : Jl. Raya Pati-Kudus KM 3,5 Kecamatan Pati, Sawah, Margorejo, Kec. Margorejo, Kabupaten Pati, Jawa Tengah 59163 Telp : (0295) 387237
                        </h6>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NAMA </th>
                                        <th>NIP</th>
                                        <th>JABATAN </th>
                                        <th>USERNAME</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($user as $peng) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>


                                            <?php
                                            // $id_user = $this->session->userdata('id_user');
                                            if ($peng->hakakses == 'Admin TU') {
                                                $cari_pengguna = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE id_user = $peng->id_user ")->row();
                                                $id_pengguna = $cari_pengguna->id_sub_umum_pegawai;
                                            } elseif ($peng->hakakses  == 'Admin Kepala') {
                                                $cari_pengguna = $this->db->query("SELECT * FROM kepala_pelaksana WHERE id_user = $peng->id_user")->row();
                                                $id_pengguna = $cari_pengguna->id_kepala_pelaksana;
                                            } elseif ($peng->hakakses  == 'Admin Bidang') {
                                                $cari_pengguna = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $peng->id_user")->row();
                                                $id_pengguna = $cari_pengguna->id_kepala_bidang;
                                            }
                                            ?>
                                            <td><?= $cari_pengguna->nama ?></td>
                                            <td><?= $cari_pengguna->nip ?></td>
                                            <td><?= $cari_pengguna->jabatan ?></td>

                                            <td><?= $peng->username ?></td>
                                            <td>
                                                <?php
                                                if ($peng->status == 1) {
                                                    echo 'Aktif';
                                                } else {
                                                    echo 'Tidak Aktif';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->