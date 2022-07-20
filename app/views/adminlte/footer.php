    </div>
    <!-- /.content-wrapper -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://adminlte.io/themes/AdminLTE/dist/js/demo.js"></script>

<!-- package -->
<script src="<?= BASEURL;?>/js/sweetalert.min.js"></script>

<!-- Folder.js -->
<?php if(isset($data['class'])): ?>
  <script src="<?=BASEURL;?>/js/<?= $data['class']?>/index.js"></script>
<?php endif; ?>

<script>
$(document).ready(function () {
  $('.sidebar-menu').tree()
})
</script>
</body>
</html>
