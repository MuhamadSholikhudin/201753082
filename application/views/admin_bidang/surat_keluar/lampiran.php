<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lampiran Surat keluar</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            <!-- <button href="<?= base_url('surat_keluar/tambah_lampiran') ?>" class="btn btn-primary " >+ Lampiran Surat keluar</button> -->
                            
                            <?php if ($this->session->userdata('hakakses') == 'Admin TU') { ?>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                + Lampiran Surat keluar
                            </button>
                            <?php }else{

                            } ?>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Tambah Lampiran</h4>
                                        </div>
                                        <form role="form" action="<?= base_url('surat_keluar/aksi_tambah_lampiran') ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Nama Lampiran :</label>
                                                            <input class="form-control" type="hidden" name="id_suratkeluar" value="<?= $surat_keluar->id_suratkeluar ?>" required>
                                                            <input class="form-control" type="text" name="nama_lampiran" placeholder="Nama Lampiran" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>File input Lampiran :</label>
                                                            <input class="form-control" type="file" name="file_lampiran" required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </p>
                        <div class="panel panel-default mt-3">


                            <div class="panel-heading">
                                Data Lampiran Surat keluar
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
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 165px;">ID Lampiran</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">Nama Lampiran</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($lampiran as $lamp) : ?>

                                                            <tr class="gradeA odd" role="row">
                                                                <td class="sorting_1">
                                                                    <?= $lamp->id_lampiran ?>

                                                                </td>
                                                                <td><?= $lamp->nama_lampiran ?></td>

                                                                <td class="center">

                                                                    <a href="<?= base_url('surat_keluar/file_lampiran/') . $lamp->id_lampiran ?>" type="button" class="btn btn-default"><i class="fa fa-file-pdf-o fa-fw"></i>Lihat</a>
                                                                    <?php if ($this->session->userdata('hakakses') == 'Admin TU') { ?>
                                                                        <a href="<?= base_url('surat_keluar/edit_lampiran/') . $lamp->id_lampiran ?>" type="button" class="btn btn-warning tampilModalUbah" data-toggle="modal" data-target="#ubahModal" data-id="<?= $lamp->id_lampiran; ?>"><i class="fa fa-edit fa-fw"></i>Edit</a>
                                                                        <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Form Tambah Lampiran</h4>
                                                                                    </div>
                                                                                    <form role="form" action="<?= base_url('surat_keluar/aksi_edit_lampiran') ?>" method="post" enctype="multipart/form-data">
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                <div class="col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label>Nama Lampiran :</label>
                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                        <input class="form-control" type="hidden" id="id_lam" name="id_lampiran" required>
                                                                                                        <input class="form-control" type="hidden" name="id_suratkeluar" value="<?= $surat_keluar->id_suratkeluar ?>" required>
                                                                                                        <input class="form-control" type="text" name="nama_lampiran" placeholder="Nama Lampiran" width="" required>
                                                                                                    </div>
                                                                                                    <p></p>
                                                                                                    <div class="form-group">
                                                                                                        <label>File input Lampiran :</label>
                                                                                                        <input class="form-control" type="file" name="file_lampiran" required>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>


                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                        <a href="<?= base_url('surat_keluar/hapus_lampiran/') . $lamp->id_lampiran ?>" type="button" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>Hapus</a>

                                                                    <?php } else { ?>

                                                                    <?php } ?>
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