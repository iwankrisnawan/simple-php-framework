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
  <div class="register-box" style="border:solid 5px black; border-radius:5px; padding:10px;">
    <div class="register-logo">
      <a href="../../index2.html"><b>Toko</b>Buku</a>
    </div>
    <div class="register-box-body">
      <form class="" action="<?= BASEURL.'/'.$data['class']?>/proses_register" method="post" class="center">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="nama" placeholder="Full name">
          <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="status" placeholder="status">
          <span class="glyphicon glyphicon-heart form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
      </div>
      </form>
      <a href="<?= BASEURL.'/'.$data['class']?>/login" class="text-center">Sudah Punya Akun?</a>
    </div>
  </div>
</section>
