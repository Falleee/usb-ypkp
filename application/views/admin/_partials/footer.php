  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">Naufal</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?php echo base_url() . 'assets/plugins/jquery/jquery.min.js' ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() . 'assets/dist/js/adminlte.min.js' ?>"></script>
  <!-- Summernote -->
  <script src="<?php echo base_url() . 'assets/plugins/summernote/summernote-bs4.min.js'?>"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/buttons.html5.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/buttons.colVis.min.js' ?>"></script>
  <!-- SweetAlert2 -->
  <script src="<?php echo base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
  <!-- bs-custom-file-input -->
  <script src="<?php echo base_url() . 'assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
  <script>
    $(function() {
      // Summernote
      $('#summernote').summernote()
    })
  </script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Berhasil Membuat Akun Baru.'
        })
      });
    });
  </script>
  </body>

  </html>