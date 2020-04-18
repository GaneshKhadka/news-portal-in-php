<?php 
$_title = "Admin Dashboard";
require_once 'inc/header.php';
require_once 'inc/checklogin.php';


?>

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php require_once 'inc/sidebar.php' ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php require_once 'inc/topnav.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php flash(); ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
              Category List
          <a href="category-form.php" class="btn btn-sm btn-success float-right">
              <i class="fa fa-plus"></i> Add Category
          </a>
          </h1>
          <hr>

          <div class="row">
              <div class="col-12">
                  <table class="table table-hover table-sm">
                      <thead class="thead-dark">
                          <th>S.N</th>
                          <th>Title</th>
                          <th>Summary</th>
                          <th>Status</th>
                          <th>Created_at</th>
                          <th>Action</th>
                      </thead>
                  </table>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php require_once 'inc/copy.php' ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

 <?php require_once 'inc/logoutmodal.php'?>

<?php require_once 'inc/footer.php' ?>