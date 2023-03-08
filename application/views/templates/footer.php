
  <footer class="main-footer"><!-- untuk jenis type file yaitu footer-->
    <!-- strong>Copyright &copy; 2019 <a href="#"> System Development, PT.Denso Manufacturing Indonesia </a></strong> -->
    <strong>Copyright &copy; 2020 System Development, <font color="red"> PT.DENSO MANUFACTURING INDONESIA</font>.</strong><!--judul footer-->
    <!-- <marquee><a href="#"><h4>System Development, PT.Denso Manufacturing Indonesia<h4></a></marquee> -->
    All rights reserved. 
    <div class="float-right d-none d-sm-inline-block">      <!---type float pada footer--->
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




</body>
</html>



<script type="text/javascript">
///fungsi untuk botton
    const Toast = Swal.mixin({
      toast: true,
      position: 'botton',
      showConfirmButton: false,
      timer: 5000
    });

    ///fungsi berhasil
    function berhasil($data)
      {

          Toast.fire({
          type: 'success',
          title: $data             
          });

      }
          ///fungsi gagal
      function gagal($data)
      {
        
          Toast.fire({
          type: 'error',
          title: $data             
          });
      }

      

</script>