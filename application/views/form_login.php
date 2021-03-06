<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>PENGELOLAAN SURAT BPBD KAB PATI</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('assets'); ?>/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets'); ?>/css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="img-responsive center-block" src="<?= base_url('assets/img/logobpbdpati.png') ?>" alt="">
                <h3 class="text-center">SISTEM PENGELOLAAN SURAT </h3>
                <h4 class="text-center">BPBD KABUPATEN PATI </h4>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?= base_url('auth/login'); ?>" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required>
                                    <small><?= $this->session->flashdata('pesan'); ?></small>

                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets'); ?>/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('assets'); ?>/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('assets'); ?>/js/startmin.js"></script>

</body>

</html>