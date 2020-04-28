<?php 
$_title = "Admin Dashboard";
require_once 'inc/header.php';
require_once 'inc/checklogin.php';

$advertisement = new Advertisement;
$act = "add";
if(isset($_GET, $_GET['id']) && !empty($_GET['id'])){
    $act = "update";
    $id = (int)$_GET['id'];
    if($id <= 0){
      redirect('./advertisement.php','error',"Invalid advertisement id.");
    }
    $advertisement_info = $advertisement->getRowById($id);
    if(!$advertisement_info){
      redirect('./advertisement.php','error',"Advertisement does not exists or has been already deleted.");
    }
}
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
              Advertisement <?php echo ucfirst($act);?> Form
          </h1>
          <hr>

          <div class="row">
              <div class="col-12">
                  <form action="process/advertisement.php" method="post" enctype="multipart/form-data" class="form">
                    <div class="form-group row">
                      <label for="" class="col-sm-3">Title: </label>
                      <div class="col-sm-9">
                        <input type="text" id="title" value="<?php echo @$advertisement_info[0]->title; ?>" required placeholder="Enter Advertisement Title..." name="title" class="form-control form-control-sm">
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <label for="" class="col-sm-3">Link: </label>
                      <div class="col-sm-9">
                         <input type="text" id="link" value="<?php echo @$advertisement_info[0]->link; ?>" placeholder="Enter Advertisement link..." name="link" class="form-control form-control-sm">
                    </div>
                    </div>

                    
                    <div class="form-group row">
                      <label for="" class="col-sm-3">Start Date: </label>
                      <div class="col-sm-9">
                        <input type="date" id="start_date" value="<?php echo @$advertisement_info[0]->start_date; ?>" name="start_date" class="form-control form-control-sm">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-3">End Date: </label>
                      <div class="col-sm-9">
                        <input type="date" id="end_date" value="<?php echo @$advertisement_info[0]->end_date; ?>" required name="end_date" class="form-control form-control-sm">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-3">Status: </label>
                      <div class="col-sm-9">
                          <select name="status" id="status" class="form-control form-control-sm">
                            <option value="active" <?php echo (isset($advertisement_info) && $advertisement_info[0]->status == 'active') ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?php echo (isset($advertisement_info) && $advertisement_info[0]->status == 'inactive') ? 'selected' : '' ?>>In-Active</option>
                          </select>
                    </div>
                    </div>


                    <div class="form-group row">
                      <label for="" class="col-sm-3">Position: </label>
                      <div class="col-sm-9">
                          <select name="position" id="position" class="form-control form-control-sm">
                            <?php 
                                foreach($position as $db_key => $advertisement_name){
                                    ?>
                                        <option value="<?php echo $db_key ?>" <?php echo (isset($advertisement_info) && $advertisement_info[0]->position == $db_key) ? 'selected' : '' ?>>
                                            <?php echo ucfirst($advertisement_name) ?>
                                    </option>
                                    <?php
                                }
                            ?>

                          </select>
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-3">Image: </label>
                      <div class="col-sm-4">
                          <input type="file" name="image" accept="image/*" id="image"> 
                    </div>
                    <div class="col-sm-4">
                      <?php 
                        if($act == 'update' && $advertisement_info[0]->image != null && file_exists(UPLOAD_PATH.'advertisement/'.$advertisement_info[0]->image)){
                          ?>
                          <img src="<?php echo UPLOAD_URL.'advertisement/'.$advertisement_info[0]->image ?>" alt="" class="img img-fluid img-thumbnail">
                          <?php
                        }
                      ?>
                    </div>
                    </div>
                    

                    <div class="form-group row">
                      <div class="offset-3 col-sm-9">
                        <input type="hidden" name="advertisement_id" value="<?php echo @$advertisement_info[0]->id?>">
                        <input type="hidden" name="old_image" value="<?php echo @$advertisement_info[0]->image?>">
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