<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">user</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            <a href="<?= base_url('admin_tu/user/tambah') ?>" class="btn btn-primary ">+ user</a>
                        </p>
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="panel panel-default mt-3">
                            <div class="panel-heading">
                                Data user
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
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 165px;">Nama user</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">Nip</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 192px;">Jabatan</th>
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 192px;">Email</th> -->
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 141px;">Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 141px;">Hak Akses</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10px;">Foto</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach ($user as $peg) : ?>
                                                            <?php
                                                            if ($peg->hakakses == "Admin TU") {
                                                                $cari_user = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE id_user = $peg->id_user ")->row();
                                                            } elseif ($peg->hakakses == "Admin Kepala") {
                                                                $cari_user = $this->db->query("SELECT * FROM kepala_pelaksana WHERE id_user = $peg->id_user ")->row();
                                                            } elseif ($peg->hakakses == "Admin Bidang") {
                                                                $cari_user = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $peg->id_user ")->row();
                                                            }
                                                            ?>
                                                            <tr class="gradeA odd" role="row">
                                                                <td class="sorting_1"><?= $cari_user->nama ?></td>
                                                                <td><?= $cari_user->nip ?></td>
                                                                <td><?= $cari_user->jabatan ?></td>
                                                                <!-- <td><?= $peg->email ?></td> -->
                                                                <td class="center"><?= $peg->username ?></td>
                                                                <td class="center"><?= $peg->hakakses ?></td>
                                                                <td class="center">
                                                                    <img src="<?= base_url('uploads/foto/') . $cari_user->foto ?>" alt="" height="50px" width="50px">
                                                                </td>
                                                                <td class="center">

                                                                    <a href="<?= base_url('admin_tu/user/edit/') . $peg->id_user ?>" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                                                                    <a href="<?= base_url('admin_tu/user/lihat/') . $peg->id_user ?>" type="button" class="btn btn-success"><i class="fa fa-eye fa-fw"></i>Lihat</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
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
