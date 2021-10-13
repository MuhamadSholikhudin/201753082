<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan Surat Masuk</h1>
            </div>


            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Laporan
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-4">
                                <h3>Pertanggal</h3>
                                <form role="form" action="<?= base_url('admin_kepala/laporan_surat_masuk') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="pilihan" value="tanggal">
                                        <label>Tanggal awal</label>
                                        <input type="date" name="tanggal_awal" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal akhir</label>
                                        <input type="date" name="tanggal_akhir" class="form-control" required>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <h3>Perbulan</h3>
                                <form role="form" action="<?= base_url('admin_kepala/laporan_surat_masuk') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="pilihan" value="bulan">
                                        <label>Bulan</label>
                                        <select class="form-control" name="bulan" required>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <select class="form-control" name="tahun" required>
                                            <?php $mulai = date('Y') - 20;
                                            for ($i = $mulai; $i < $mulai + 21; $i++) {
                                                $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="reset" class="btn btn-default">Reset </button>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form role="form" action="<?= base_url('admin_kepala/laporan_surat_masuk') ?>" method="POST" enctype="multipart/form-data">
                                    <h3>Pertahun</h3>
                                    <div class="form-group">
                                        <input type="hidden" name="pilihan" value="tahun">
                                        <label>Tahun</label>
                                        <select class="form-control" name="tahun" required>
                                            <?php $mulai = date('Y') - 20;
                                            for ($i = $mulai; $i < $mulai + 21; $i++) {
                                                $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>


                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <div class="col-lg-12">
                <?php
                if ($cetak[0] == 'tanggal') { ?>
                    <a href="<?= base_url('admin_kepala/laporan_surat_masuk/cetak_surat_masuk_tanggal/' . $tanggal[0] . '/' . $tanggal[1]) ?>" target="_blank" class="btn btn-warning ">
                        <i class="fa fa-print"></i>
                        Cetak</a>


                <?php
                } elseif ($cetak[0] == 'bulan') {
                ?>

                    <a href="<?= base_url('admin_kepala/laporan_surat_masuk/cetak_surat_masuk_bulan/' . $bulan[0] . '/' . $bulan[1]) ?>" target="_blank" class="btn btn-warning ">
                        <i class="fa fa-print"></i>
                        Cetak
                    </a>
                <?php

                } elseif ($cetak[0] == 'tahun') {
                ?>
                    <a href="<?= base_url('admin_kepala/laporan_surat_masuk/cetak_surat_masuk_tahun/' . $tahun[0]) ?>" target="_blank" target="_blank" class="btn btn-warning ">
                        <i class="fa fa-print"></i>
                        Cetak
                    </a>
                <?php

                } elseif ($cetak[0] == 'normal') {
                }
                ?>

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
                                        <th>Asal Surat</th>
                                        <th>No Surat</th>
                                        <th>Isi </th>
                                        <th>Tgl. Surat</th>
                                        <th>Tgl. Catat</th>
                                        <th>Keterangan</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($surat_masuk as $peng) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>

                                                <?php
                                                $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $peng->id_instansi ")->row();

                                                echo $cari_instansi->nama_instansi
                                                ?>
                                            </td>
                                            <td><?= $peng->no_suratmasuk ?></td>
                                            <td><?= $peng->isi_ringkas ?></td>
                                            <td><?= $peng->tanggal_surat ?></td>
                                            <td><?= $peng->tanggal_teruskan ?></td>
                                            <td><?= $peng->catatan ?></td>
                                            <!-- <td>
                                                <?php
                                                if ($peng->status == 0) {
                                                    echo 'dikembalikan';
                                                } elseif ($peng->status == 1) {
                                                    echo 'mendaftar';
                                                } elseif ($peng->status == 2) {
                                                    echo 'diterima';
                                                } elseif ($peng->status == 3) {
                                                    echo 'jadi santri';
                                                } else {
                                                    echo 'enak';
                                                }
                                                ?>
                                            </td> -->


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