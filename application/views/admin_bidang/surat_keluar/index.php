<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Surat keluar</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            <a href="<?= base_url('admin_bidang/surat_keluar/tambah') ?>" class="btn btn-primary ">+ Surat keluar</a>
                        </p>
                        <?= $this->session->flashdata('pesan'); ?>

                        <div class="panel panel-default mt-3">
                            <div class="panel-heading">
                                Data Surat keluar
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
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Kepada </th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Klasifikasi</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Perihal</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tanggal keluar</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Diterima</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($surat_keluar as $keluar) : ?>
                                                            <tr class="gradeA odd" role="row">
                                                                <td class="sorting_1">
                                                                    <?php
                                                                    $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $keluar->id_instansi ")->row();
                                                                    echo $cari_instansi->nama_instansi
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $cari_klasifikasi = $this->db->query("SELECT * FROM klasifikasi WHERE id_klasifikasi = $keluar->id_klasifikasi ")->row();
                                                                    echo $cari_klasifikasi->klasifikasi
                                                                    ?>
                                                                </td>
                                                                <td><?= $keluar->perihal ?></td>
                                                                <td class="center"><?= $keluar->tanggal_surat ?></td>
                                                                <td class="center">
                                                                    <?php if ($keluar->status == 0) {
                                                                        echo 'Surat baru';
                                                                    } elseif ($keluar->status == 1) {
                                                                        echo 'Surat Terkirim Kepala Pelaksana';
                                                                    } elseif ($keluar->status == 2) {
                                                                        echo 'Surat terkirim ke kepala pelaksana';
                                                                    } elseif ($keluar->status == 3) {
                                                                        echo 'Surat sudah di baca';
                                                                    } elseif ($keluar->status == 4) {
                                                                        echo 'Surat di Setujui oleh kepala pelaksana';
                                                                    } elseif ($keluar->status == 5) {
                                                                        echo 'Surat sudah ke instansi terkait';
                                                                    } else {
                                                                        echo 'Surat informasi';
                                                                    } ?>

                                                                </td>
                                                                <td class="center">
                                                                    <?php if ($keluar->status == 0) { ?>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/kirim/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-info"><i class="fa ??? fa-location-arrow fa-fw"></i> Kirim</a>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/edit/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/hapus/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>Hapus</a>
                                                                    <?php } elseif ($keluar->status == 1) { ?>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/kirim/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-info"><i class="fa ??? fa-location-arrow fa-fw"></i> Kirim</a>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/edit/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/hapus/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>Hapus</a>
                                                                    <?php } elseif ($keluar->status == 2) { ?>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/lihat/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-success"><i class="fa ??? fa-eye fa-fw"></i> Lihat</a>
                                                                    <?php } elseif ($keluar->status == 3) { ?>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/lihat/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-success"><i class="fa ??? fa-eye fa-fw"></i> Lihat</a>
                                                                    <?php   } elseif ($keluar->status == 4) { ?>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/lihat/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-success"><i class="fa ??? fa-eye fa-fw"></i> Lihat</a>
                                                                    <?php   } elseif ($keluar->status == 5) { ?>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/lihat/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-success"><i class="fa ??? fa-eye fa-fw"></i> Lihat</a>
                                                                    <?php   } else { ?>
                                                                        <a href="<?= base_url('admin_bidang/surat_keluar/lihat/') . $keluar->id_suratkeluar ?>" type="button" class="btn btn-success"><i class="fa ??? fa-eye fa-fw"></i> Lihat</a>
                                                                    <?php   } ?>

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