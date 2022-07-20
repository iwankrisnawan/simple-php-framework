<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Toko Buku</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?= BASEURL;?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= BASEURL;?>/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?= BASEURL;?>/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= BASEURL;?>/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?= BASEURL;?>/dist/css/skins/_all-skins.min.css">

<section class="content">
  <div class="login-box" style="border:solid 5px black; border-radius:5px; padding:10px;">
    <div class="login-logo">
      <a href="../../index2.html"><b>Perpus</b>Buku</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <form action="<?= BASEURL.'/'.$data['class']?>/proses_login" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- <a href="<?= BASEURL.'/'.$data['class']?>/register" class="text-center">Belum Punya Akun?</a> -->
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
</section>
