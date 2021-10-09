<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope-open fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $n_masuk = $this->db->query("SELECT * FROM surat_masuk")->num_rows();

                                    ?>
                                    <div class="huge"><?= $n_masuk ?></div>
                                    <div>Surat Masuk !</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('surat_masuk') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $n_keluar = $this->db->query("SELECT * FROM surat_keluar")->num_rows();

                                    ?>
                                    <div class="huge"><?= $n_keluar ?></div>
                                    <div>Surat Keluar!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('surat_keluar') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-institution fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $n_instansi = $this->db->query("SELECT * FROM instansi")->num_rows();

                                    ?>
                                    <div class="huge"><?= $n_instansi  ?></div>
                                    <div>Instansi!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('instansi') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $n_user = $this->db->query("SELECT * FROM user")->num_rows();

                                    ?>
                                    <div class="huge"><?= $n_user ?></div>
                                    <div>User !</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('user') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->