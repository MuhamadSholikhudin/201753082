<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lampiran Surat Masuk</h1>
                <a href="<?= base_url('validasi_surat_masuk/lampiran/') . $lampiran->id_suratmasuk ?>" class="btn btn-primary">Kembali</a>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <p>

                        </p>
                        <div class="panel panel-default mt-3">


                            <div class="panel-heading">
                                Data Lampiran Surat Masuk
                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <!-- <img src="<?= base_url('uploads/lampiran/') . $lampiran->file_lampiran ?>" alt=""> -->
                                <object data="<?= base_url('uploads/lampiran/') . $lampiran->file_lampiran ?>" type="" width="100%" height="1000px"></object>


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