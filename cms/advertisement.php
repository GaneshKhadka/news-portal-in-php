<?php 
$_title = "Admin Dashboard";
require_once 'inc/header.php';
require_once 'inc/checklogin.php';

$advertisement = new Advertisement;

?>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL.'/datatables.min.css'?>">

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
              Advertisement List
          <a href="advertisement-form.php" class="btn btn-sm btn-success float-right">
              <i class="fa fa-plus"></i> Add Advertisement
          </a>
          </h1>
          <hr>

          <div class="row">
              <div class="col-12">
                  <table class="table table-hover table-sm">
                      <thead class="thead-dark">
                          <th>S.N</th>
                          <th>Title</th>
                          <th>Link</th>
                          <th>Status</th>
                          <th>Position</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Created_at</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                          <?php 
                            $all_rows = $advertisement -> getAllRows();
                            if($all_rows){
                              foreach($all_rows as $key => $advertisement_info){
                                ?>
                                <tr>
                                  <td><?php echo $key+1 ?></td>
                                  <td><?php echo $advertisement_info -> title ?></td>
                                  <td><?php echo $advertisement_info -> link ?></td>
                                  <td>
                                    <span class="badge badge-<?php echo ($advertisement_info -> status == 'active') ? 'success' : 'danger' ?>"><?php echo ucfirst($advertisement_info -> status) ?></span>
                                  </td>
                                  <td><?php echo $advertisement_info -> position ?></td>
                                  <td><?php echo $advertisement_info -> start_date ?></td>
                                  <td><?php echo $advertisement_info -> end_date ?></td>
                                  <td><?php echo date("Y-m-d", strtotime($advertisement_info -> created_at)) ?></td>
                                  <td>
                                    <a href="advertisement-form.php?id=<?php echo $advertisement_info->id; ?>" class="btn btn-success btn-sm" style="border-radius:50%">
                                      <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="process/advertisement.php?id=<?php echo $advertisement_info->id; ?>" onclick="return confirm('Are you sure you want to delete this advertisement?');"class="btn btn-danger btn-sm" style="border-radius:50%">
                                      <i class="fa fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <?php
                              }
                            }
                          ?>
                      </tbody>
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
<script src="<?php echo ADMIN_JS_URL.'/datatables.min.js'?>"></script>
<script>
    $('.table').DataTable();
</script>