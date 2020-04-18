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
              Category Add Form
          </h1>
          <hr>

          <div class="row">
              <div class="col-12">
                  <form action="process/category.php" method="post" enctype="multipart/form-data" class="form">
                    <div class="form-group row">
                      <label for="" class="col-sm-3">Title: </label>
                      <div class="col-sm-9">
                        <input type="text" id="title"required placeholder="Enter Category Title..." name="title" class="form-control form-control-sm">
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <label for="" class="col-sm-3">Summary: </label>
                      <div class="col-sm-9">
                        <textarea name="summary" id="summary" rows="5" placeholder="Enter category summary.." style="resize: none;" class="form-control form-control-sm"></textarea>
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-3">Status: </label>
                      <div class="col-sm-9">
                          <select name="status" id="status" required class="form-control form-control-sm">
                            <option value="active">Active</option>
                            <option value="inactive">In-Active</option>
                          </select>
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-3">Image: </label>
                      <div class="col-sm-9">
                          <input type="file" name="image" accept="image/*" id="image"> 
                    </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-3 col-sm-9">
                          <button class="btn btn-danger" type="reset">
                            <i class="fa fa-trash"></i> Reset
                          </button>
                          <button class="btn btn-success" type="submit">
                            <i class="fa fa-paper-plane"></i> Submit
                          </button>
                    </div>
                    </div>

                  </form>
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