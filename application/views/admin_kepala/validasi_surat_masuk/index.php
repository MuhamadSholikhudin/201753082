<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Surat Masuk</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            <?php if ($this->session->userdata('hakakses') == 'Admin TU') { ?>
                                <a href="<?= base_url('surat_masuk/tambah') ?>" class="btn btn-primary ">+ Surat Masuk</a>

                            <?php } elseif ($this->session->userdata('hakakses') == 'Admin Kepala') { ?>

                            <?php } ?> </p>
                        <?= $this->session->flashdata('pesan'); ?>

                        <div class="panel panel-default mt-3">
                            <div class="panel-heading">
                                Data Surat Masuk
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dari</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Klasifikasi</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Perihal</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tanggal Masuk</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($surat_masuk as $masuk) : ?>
                                                            <tr class=" table-warning" role="row">
                                                                <td class="sorting_1">
                                                                    <!-- <?= $masuk->id_instansi ?> -->
                                                                    <?php
                                                                    $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $masuk->id_instansi ")->row();

                                                                    echo $cari_instansi->nama_instansi
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                <?php
                                                                    $cari_klasifikasi = $this->db->query("SELECT * FROM klasifikasi WHERE id_klasifikasi = $masuk->id_klasifikasi ")->row();

                                                                    echo $cari_klasifikasi->klasifikasi
                                                                    ?>
                                                                </td>
                                                                <td><?= $masuk->perihal ?></td>
                                                                <td class="center"><?= $masuk->tanggal_surat ?></td>
                                                                <td class="center ">
                                                                    <?php if ($masuk->status == 0) {
                                                                        echo 'Surat baru';
                                                                    } elseif ($masuk->status == 1) {
                                                                        echo 'Surat Terkirim Kepala Pelaksana';
                                                                    } elseif ($masuk->status == 2) {
                                                                        // echo 'Surat belum di validasi kepala pelaksana'; 
                                                                        ?>
                                                                        <button type="button" class="btn btn-primary position-relative">

                                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                                Surat belum dibaca dan  di validasi kepala pelaksana
                                                                            <!-- <span class="visually-hidden">unread messages</span> -->
                                                                            </span>
                                                                        </button>
                                                                        <?php 
                                                                    } elseif ($masuk->status == 3) {
                                                                        // echo 'Surat sudah di baca';
                                                                        ?>
                                                                        <button type="button" class="btn btn-warning position-relative">
                                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                                Surat sudah di baca
                                                                            <!-- <span class="visually-hidden">unread messages</span> -->
                                                                            </span>
                                                                        </button>
                                                                    <?php 

                                                                    } elseif ($masuk->status == 4) {
                                                                        echo 'Surat di validasi oleh kepala pelaksana';
                                                                    } elseif ($masuk->status == 5) {
                                                                        echo 'Surat sudah ke instansi terkait';
                                                                    } else {
                                                                        echo 'Surat informasi';
                                                                    } ?> </td>
                                                                <td class="center">
                                                                    <a href="<?= base_url('admin_kepala/validasi_surat_masuk/cek/') . $masuk->id_suratmasuk ?>" type="button" class="btn btn-primary"><i class="fa fa-check-square-o fa-fw"></i> Cek</a>
                                                                    <a href="<?= base_url('admin_kepala/validasi_surat_masuk/lihat/') . $masuk->id_suratmasuk ?>" type="button" class="btn btn-success"><i class="fa fa-eye fa-fw"></i> Lihat</a>
                                                                    <!-- <a href="<?= base_url('admin_kepala/validasi_surat_masuk/lampiran/') . $masuk->id_suratmasuk ?>" type="button" class="btn btn-default"><i class="fa fa-file-pdf-o fa-fw"></i>Lampiran</a> -->
                                                                    <!-- <a href="<?= base_url('admin_kepala/validasi_surat_masuk/edit/') . $masuk->id_suratmasuk ?>" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a> -->
                                                                    <!-- <a href="<?= base_url('admin_kepala/validasi_surat_masuk/hapus/') . $masuk->id_suratmasuk ?>" type="button" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>Hapus</a> -->
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.table-responsive -->


                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>





            </div>


        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
