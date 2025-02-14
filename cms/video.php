<?php 
$_title = "Admin Dashboard";
require_once 'inc/header.php';
require_once 'inc/checklogin.php';

$video = new Video;

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
              Video List
          <a href="video-form.php" class="btn btn-sm btn-success float-right">
              <i class="fa fa-plus"></i> Add Video
          </a>
          </h1>
          <hr>

          <div class="row">
              <div class="col-12">
                  <table class="table table-hover table-sm">
                      <thead class="thead-dark">
                          <th>S.N</th>
                          <th>Title</th>
                          <th>Thumbnail</th>
                          <th>Status</th>
                          <th>Created_at</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                          <?php 
                            $all_rows = $video -> getAllRows();
                            if($all_rows){
                              foreach($all_rows as $key => $video_info){
                                ?>
                                <tr>
                                  <td><?php echo $key+1 ?></td>
                                  <td><?php echo $video_info -> title ?></td>
                                  <td>
                                      <iframe width="" height="" src="https://www.youtube.com/embed/<?php echo $video_info->video_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                  <td>
                                    <span class="badge badge-<?php echo ($video_info -> status == 'active') ? 'success' : 'danger' ?>"><?php echo ucfirst($video_info -> status) ?></span>
                                  </td>
                                  <td><?php echo date("Y-m-d", strtotime($video_info -> created_at)) ?></td>
                                  <td>
                                    <a href="video-form.php?id=<?php echo $video_info->id; ?>" class="btn btn-success btn-sm" style="border-radius:50%">
                                      <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="process/video.php?id=<?php echo $video_info->id; ?>" onclick="return confirm('Are you sure you want to delete this video?');"class="btn btn-danger btn-sm" style="border-radius:50%">
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