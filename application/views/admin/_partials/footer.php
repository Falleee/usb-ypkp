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
    <strong>Copyright &copy; 2020 <a href="https://usbypkp.ac.id">Naufal</a>.</strong> All rights reserved.
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
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/jszip/jszip.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/pdfmake/pdfmake.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/pdfmake/vfs_fonts.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/buttons.html5.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/buttons.print.min.js'?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables-buttons/js/buttons.colVis.min.js'?>"></script>
  <!-- date-range-picker -->
  <script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
  <!-- SweetAlert2 -->
  <script src="<?php echo base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
  <!-- bs-custom-file-input -->
  <script src="<?php echo base_url() . 'assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
  <!-- Untuk Read Foto  -->
  <script src="<?php echo base_url() . 'assets/js/lightgallery-all.min.js' ?>"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url() . 'assets/plugins/moment/moment.min.js' ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url() . 'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' ?>"></script>
  <script>
    $(function() {

      //Date range picker
      $('#reservationdate').datetimepicker({
        format: 'Y-M-d'
      });
    })
  </script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#lightgallery').lightGallery();
    });
  </script>
  <!-- Untuk Read Foto  -->
  <script>
    $(document).ready(function() {
      $('#lightgallery1').lightGallery();
    });
  </script>
  <!-- Untuk R ead Foto  -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

  <!-- Batas -->

  </body>

  </html>