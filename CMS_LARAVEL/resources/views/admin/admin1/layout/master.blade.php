<!DOCTYPE html>
<html lang="en">


@include('admin.admin1.layout.head')
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   @include('admin.admin1.layout.slide_bar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      @section('content')

      @show
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('admin.admin1.layout.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('admin.admin1.layout.logoutModel')

  @include('admin.admin1.layout.link')

</body>

</html>
