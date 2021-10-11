<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Surat Masuk Surat Keluar</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?= base_url('assets/') ?>css/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?= base_url('assets/') ?>css/startmin.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?= base_url('assets/') ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <link href="<?= base_url('assets/') ?>css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>css/dataTables/dataTables.responsive.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
<?php
  $id_user = $this->session->userdata('id_user');
  if($this->session->userdata('hakakses') == 'Admin TU'){
        $cari_pengguna = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE id_user = $id_user ")->row();
         $id_pengguna = $cari_pengguna->id_sub_umum_pegawai;
        
  }elseif($this->session->userdata('hakakses') == 'Admin Kepala'){
        $cari_pengguna = $this->db->query("SELECT * FROM kepala_pelaksan WHERE id_user = $id_user")->row();
        $id_pengguna = $cari_pengguna->id_kepala_pelaksana;
  }elseif($this->session->userdata('hakakses') == 'Admin Bidang'){
        $cari_pengguna = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $id_user")->row();
      $id_pengguna = $cari_pengguna->id_kepala_bidang;
  }else{
      redirect('auth/logout');
  }
?>
  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?= base_url('dashboard') ?>"> Surat BPBD</a>
      </div>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-home fa-fw"></i> Website</a></li>
      </ul>

      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">

          <?php
          if ($this->session->userdata('hakakses') == 'Admin Kepala') {

          ?>
            <a class="dropdown-toggle " data-toggle="dropdown" href="#">
              <i class="fa fa-bell fa-fw"></i><span class="text-white">
                <?php
                $hitung_masuk = $this->db->query("SELECT COUNT(id_suratmasuk) as surat FROM surat_masuk WHERE status = 1")->row();

                if ($hitung_masuk->surat > 0) {
                  $n_masuk = $hitung_masuk->surat;
                } else {
                  $n_masuk = 0;
                }


                $hitung_keluar = $this->db->query("SELECT COUNT(id_suratkeluar) as surat FROM surat_keluar WHERE status = 1")->row();

                if ($hitung_keluar->surat > 0) {
                  $n_keluar = $hitung_keluar->surat;
                } else {
                  $n_keluar = 0;
                }

                echo $n_keluar + $n_masuk;
                ?>

              </span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
              <?php foreach ($surat_kirim as $kir) : ?>
                <li>
                  <a href="<?= base_url('validasi_surat_masuk/lihat/' . $kir->id_suratmasuk) ?>">
                    <div>
                      <i class="fa fa-envelope-open fa-fw"></i>
                      <?php
                      $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $kir->id_instansi ")->row();

                      echo $cari_instansi->nama_instansi
                      ?>
                      <!-- <span class="pull-right text-muted small">12 minutes ago</span> -->
                    </div>
                  </a>
                </li>
              <?php endforeach ?>

              <?php foreach ($surat_keluar_baru as $bar) : ?>

                <li>
                  <a href="<?= base_url('persetujuan_surat_keluar/lihat/' . $bar->id_suratkeluar) ?>">
                    <div>
                      <i class="fa fa-envelope fa-fw"></i>
                      <?php
                      $c_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $bar->id_instansi ")->row();

                      echo $c_instansi->nama_instansi
                      ?>
                      <!-- <span class="pull-right text-muted small">4 minutes ago</span> -->
                    </div>
                  </a>
                </li>
              <?php endforeach ?>

            </ul>

          <?php } elseif ($this->session->userdata('hakakses') == 'Admin TU') { ?>
            <a class="dropdown-toggle " data-toggle="dropdown" href="#">
              <i class="fa fa-bell fa-fw"></i><span class="text-white">
                <?php
            $id_user = $this->session->userdata('id_user');

                $hitung_masuk = $this->db->query("SELECT COUNT(surat_masuk.id_suratmasuk) as surat FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->row();

                if ($hitung_masuk->surat > 0) {
                  $n_masuk = $hitung_masuk->surat;
                } else {
                  $n_masuk = 0;
                }


                // $hitung_keluar = $this->db->query("SELECT COUNT(id_suratkeluar) as surat FROM surat_keluar WHERE status = 1")->row();

                // if ($hitung_keluar->surat > 0) {
                //   $n_keluar = $hitung_keluar->surat;
                // } else {
                //   $n_keluar = 0;
                // }

                echo  $n_masuk;
                ?>

              </span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
              <?php foreach ($surat_valid as $kir) : ?>
                <li>
                  <a href="<?= base_url('surat_masuk/lihat/' . $kir->id_suratmasuk) ?>">
                    <div>
                      <i class="fa fa-envelope-open fa-fw"></i>
                      <?php
                      $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $kir->id_instansi ")->row();

                      echo $cari_instansi->nama_instansi
                      ?>
                      <span class="pull-right text-muted small">Sudah Valid</span>
                    </div>
                  </a>
                </li>
              <?php endforeach ?>

             

            </ul>

          <?php } elseif ($this->session->userdata('hakakses') == 'Admin Bidang') { ?>
            <a class="dropdown-toggle " data-toggle="dropdown" href="#">
              <i class="fa fa-bell fa-fw"></i><span class="text-white">
              </span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">

              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                    <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
                </a>
              </li>
            </ul>


          <?php
          }
          ?>
        </li>


        <!-- <li class="divider"></li>
            <li>
              <a class="text-center" href="#">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
              </a>
            </li> -->

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <?= $this->session->userdata('nama') ?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>

              <?php
 //             $id_peg =  $this->session->userdata('id_user');

//              $cari_foto = $this->db->query("SELECT * FROM user WHERE id_user = $id_peg ")->row();
              ?>
              <img src="<?= base_url('uploads/foto/') . $cari_pengguna->foto ?>" width="100%" height="150px" alt="" srcset="">
            </li>
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> -->
        </li>
        <li class="divider"></li>
        <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
      </ul>
      </li>
      </ul>
      <!-- /.navbar-top-links -->
