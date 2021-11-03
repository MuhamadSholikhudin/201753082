<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <!-- Bootstrap Core CSS -->
  <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?= base_url('assets/') ?>css/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?= base_url('assets/') ?>css/startmin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?= base_url('assets/') ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="panel-body bg-white">
                        <div class="card p-3">
                            <div class="header">
                                <div class="row">
                                <div class="col-md-12 mb-3">
                                    <table>
                                        <tbody>
                                            <td>
                                        <img src="<?= base_url('assets/img/logobpbdpati.png') ?>" alt="" width="150">
                                                
                                            </td>
                                            <td>
                                                <h4 class="text-center">PEMERINTAH KABUPATEN PATI</h4>
                                                <h4 class="text-center">BADAN PENANGGULANGAN BENCANA DAERAH</h4>
                                                <h6 class="text-center">Jln. Raya Pati Kudus KM 3,5 Margorej- Pati No.99 Telp. .(0291) 438691, 431470, Fax (0291) 438691</h6>
                                                <h6 class="text-center">PATI 59322</h6>
                                            </td>
                                        </tbody>
                                    </table>
                            </div>
                                    <!-- <div class="col-md-2">
                                        <img src="<?= base_url('assets/img/logobpbdpati.png') ?>" alt="" width="100">
                                    </div>
                                    <div class="col-md-10">
                                        <h3 class="text-center">PEMERINTAH KABUPATEN PATI</h3>
                                        <h3 class="text-center">BADAN PENANGGULANGAN BENCANA DAERAH</h3>
                                        <h5 class="text-center">Jln. Raya Pati Kudus KM 3,5 Margorej- Pati No.99 Telp. .(0291) 438691, 431470, Fax (0291) 438691</h5>
                                        <h3 class="text-center">PATI 59322</h3>
                                    </div> -->
                                </div>

                            </div>
                            <strong>

                                <hr style="height:2px; color:black;background-color:black">
                            </strong>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <h4> Pati, <?= $surat_keluar->tanggal_surat ?> </h4>
                                        </div>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Nomor</td>
                                                    <td>:</td>
                                                    <td>&nbsp; <?= $surat_keluar->no_suratkeluar ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Perihal &nbsp;&nbsp;&nbsp;</td>
                                                    <td>:</td>
                                                    <td>&nbsp; <?= $surat_keluar->perihal ?></td>
                                                </tr>
                                                <!-- <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr> -->
                                            </tbody>
                                        </table>

                                        <!-- <div class="text-left">
                                            <div class="col-sm-12 lead"> Nomor &nbsp;&nbsp;&nbsp; : <?= $surat_keluar->no_suratkeluar ?></div> <br>
                                            <div class="col-sm-12 lead"> Lampiran : </div> <br>
                                            <div class="col-sm-12 lead"> Perihal &nbsp;&nbsp;&nbsp; : <?= $surat_keluar->perihal ?></div> <br>
                                        </div> -->

                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div>
                                        <!-- <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div> -->
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Kepada</td>
                                                    <td></td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                            $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $surat_keluar->id_instansi ")->row();
                                                            echo $cari_instansi->nama_instansi
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><?= $cari_instansi->alamat_instansi ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><?= $cari_instansi->kota ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- <div class="text-left">
                                            <div class="col-sm-12 lead"> Kepada </div> <br>
                                            <div class="col-sm-12 lead">
                                                 <?= $surat_keluar->id_instansi ?> 
                                                <?php
                                                $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $surat_keluar->id_instansi ")->row();
                                                echo $cari_instansi->nama_instansi
                                                ?>
                                            </div> <br>
                                            <div class="col-sm-12 lead"> <?= $cari_instansi->alamat_instansi ?> </div> <br>
                                            <div class="col-sm-12 lead"> <?= $cari_instansi->kota ?> </div> <br>
                                        </div>
                                        -->

                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div>
                                      

                                        <p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?= $surat_keluar->isi_ringkas ?>
                                        </p>
                                   
                                        <div class="text-left">
                                            <div class="col-sm-12 lead"> </div> <br>
                                        </div>

                                        <table class="text-center">
                                            <tbody>
                                              
                                                <tr>
                                                    <td style="width: 400px;"></td>
                                                    <td></td>
                                                    <td>
                                                    Kudus, <?= date('d-m-Y') ?>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                <td></td>
                                                    <td></td>
                                                    <td>Kepala Pelaksana BPBD Pati</td>
                                                   
                                                </tr>
                                                <tr>                                                
                                                <td></td>
                                                    <td></td>
                                                    <td><p></p></td>
                                                </tr>
                                                </tr>
                                                <tr>                                                
                                                <td></td>
                                                    <td></td>
                                                    <td><p></p></td>
                                                </tr>
                                                <tr>                                                
                                                <td></td>
                                                    <td></td>
                                                    <td><p></p></td>
                                                </tr>
                                                <tr>                                                
                                                <td></td>
                                                    <td></td>
                                                    <td><p></p></td>
                                                </tr>


                                                <?php
                                                // $id_user = $this->session->userdata('id_user');
                                                $c_setujui = $this->db->query("SELECT * FROM kepala_pelaksana JOIN setujui ON kepala_pelaksana.id_kepala_pelaksana = setujui.id_kepala_pelaksana WHERE setujui.id_suratkeluar =  $surat_keluar->id_suratkeluar");
                                                if ($c_setujui->num_rows() < 1) { ?>
                                                    <h4 class="text-center"><u></u> </h4>
                                                    <h4 class="text-center">NIP : </h4>
                                                <?php } else {
                                                    $cek_kepala = $c_setujui->row(); ?>
                                                 
                                                <tr>                                                
                                                <td></td>
                                                    <td></td>
                                                    <td><u><?= $cek_kepala->nama ?></u></td>
                                                </tr>
                                                <tr>                                                
                                                <td></td>
                                                    <td></td>
                                                    <td>NIP : <?= $cek_kepala->nip ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                       





                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <script>
                    window.print();
                    </script>

                                <!-- jQuery -->
            <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?= base_url('assets/') ?>js/metisMenu.min.js"></script>

            <script src="<?= base_url('assets/') ?>js/dataTables/jquery.dataTables.min.js"></script>

            <script src="<?= base_url('assets/') ?>js/dataTables/dataTables.bootstrap.min.js"></script>


            <!-- Custom Theme JavaScript -->
            <script src="<?= base_url('assets/') ?>/js/startmin.js"></script>
</body>
</html>