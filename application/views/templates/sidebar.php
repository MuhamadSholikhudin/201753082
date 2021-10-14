<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search">
        <div class="input-group custom-search-form">
          <!--<input type="text" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
             <button class="btn btn-primary" type="button">
              <i class="fa fa-search"></i>
            </button> -->
          <?= $this->session->userdata('hakakses') ?>
          </span>
        </div>
        <!-- /input-group -->
      </li>
      <li>
        <a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
      <!-- <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li>
            <a href="flot.html">Flot Charts</a>
          </li>
          <li>
            <a href="morris.html">Morris.js Charts</a>
          </li>
        </ul>
      </li> -->
      <!-- /.nav-second-level -->

      <?php if ($this->session->userdata('hakakses') == "Admin Kepala") { ?>
        <li>
          <a href="<?= base_url('admin_kepala/validasi_surat_masuk') ?>"><i class="fa  fa-envelope fa-fw"></i> Validasi Surat Masuk</a>
        </li>
        <li>
          <a href="<?= base_url('admin_kepala/persetujuan_surat_keluar') ?>"><i class="fa  fa-envelope-o fa-fw"></i> Persetujuan Surat Keluar</a>
        </li>

        <li>
          <a href="#"><i class="fa fa-book fa-fw"></i>Laporan<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="<?= base_url('admin_kepala/laporan_surat_masuk') ?>"> Surat Masuk</a>
            </li>
            <li>
              <a href="<?= base_url('admin_kepala/laporan_surat_masuk') ?>" >Surat Keluar</a>
            </li>
            <li>
              <a href="<?= base_url('admin_kepala/laporan_user') ?>">user</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>

      <?php } elseif ($this->session->userdata('hakakses') == "Admin TU") { ?>

        <li>
          <a href="<?= base_url('admin_tu/klasifikasi') ?>"><i class="fa fa-list fa-fw"></i> Klasifikasi</a>
        </li>
        <li>
          <a href="<?= base_url('admin_tu/surat_masuk') ?>"><i class="fa  fa-envelope fa-fw"></i> Surat Masuk</a>
        </li>
        <li>
          <a href="<?= base_url('admin_tu/surat_keluar') ?>"><i class="fa  fa-envelope-o fa-fw"></i> Surat Keluar</a>
        </li>
        <li>
          <a href="<?= base_url('admin_tu/instansi') ?>"><i class="fa fa-institution fa-fw"></i> Instansi</a>
        </li>
        <li>
          <a href="<?= base_url('admin_tu/user') ?>"><i class="fa fa-user fa-fw"></i> user</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-book fa-fw"></i>Laporan<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="<?= base_url('admin_tu/laporan_surat_masuk') ?>">Surat Masuk</a>
            </li>
            <li>
              <a href="<?= base_url('admin_tu/laporan_surat_masuk') ?>">Surat Keluar</a>
            </li>
            <li>
              <a href="<?= base_url('admin_tu/laporan_user') ?>">user</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>

      <?php } elseif ($this->session->userdata('hakakses') == "Admin Bidang") { ?>
        <li>
          <a href="<?= base_url('admin_bidang/surat_masuk') ?>"><i class="fa  fa-envelope fa-fw"></i> Surat Masuk</a>
        </li>
        <li>
          <a href="<?= base_url('admin_bidang/surat_keluar') ?>"><i class="fa  fa-envelope-o fa-fw"></i> Surat Keluar</a>
        </li>
      <?php } else { ?>

      <?php }   ?>




    </ul>
  </div>
  <!-- /.sidebar-collapse -->
</div>



<!-- /.navbar-static-side -->
</nav>