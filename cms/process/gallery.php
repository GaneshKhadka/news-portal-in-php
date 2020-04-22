<?php
    require "../../config/init.php";
    require "../inc/checklogin.php";

    // debug($_POST);
    // debug($_FILES);
    $gallery = new Gallery;

    if(isset($_POST) && !empty($_POST)){


    // debug($_POST);
    // debug($_FILES,true);

        if(empty($_POST['title'])){
            redirect('../gallery-form','error','Title field is required.');
        }

        $data = array(
            'title' => sanitize($_POST['title']),
            'summary' => sanitize($_POST['summary']),
            'status' => sanitize($_POST['status']),
        );

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $image_name = uploadImage($_FILES['image'], "gallery");
            if($image_name){
                $data['image'] = $image_name;
                if(isset($_POST['old_image']) && !empty($_POST['old_image'])){
                    deleteImage($_POST['old_image'],"gallery");
                }
            }
        }

        $gallery_id = (isset($_POST['gallery_id']) && !empty($_POST['gallery_id'])) ? (int)$_POST['gallery_id'] : null;
        if($gallery_id){
            // update
            $act = "updat";
            $gallery_id = $gallery->updateData($data, $gallery_id);

        }else{
            // add
            $act = "add";
            $data['added_by'] = $_SESSION['user_id'];
            $gallery_id = $gallery->insertData($data);

        }

        if($gallery_id){

            if(isset($_FILES['related_images']) && !empty($_FILES['related_images'])){
                $related_images = $_FILES['related_images'];
                $size = count($related_images['name']);

                for($i=0; $i<$size; $i++){
                    $temp = array(
                        'name' => $related_images['name'][$i],
                        'tmp_name' => $related_images['tmp_name'][$i],
                        'size' => $related_images['size'][$i],
                        'type' => $related_images['type'][$i],
                        'error' =>$related_images['error'][$i],
                    );
                    $image_name_rel = uploadImage($temp,'gallery');
                    if($image_name_rel){
                        $temp_data = array(
                            'gallery_id' => $gallery_id,
                            'image' => $image_name_rel
                        );
                        $gallery_img_obj = new GalleryImages;
                        $gallery_img_obj->insertData($temp_data);
                    }
                }
            }

            redirect('../gallery.php','success','Gallery '.$act.'ed successfully.');
        } else {
            redirect('../gallery.php','error','Sorry! There was problem while '.$act.'ing gallery.');
        }

    } else if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect("../gallery.php","error","Invalid Gallery id.");
        }
        $cat_info = $gallery->getRowById($id);
        if(!$cat_info){
            redirect("../gallery.php","error","Gallery does not exists or has been already deleted.");
        }

        $del = $gallery -> deleteRowById($id);
        if($del){
            deleteImage($cat_info[0]->image,"gallery");
            redirect("../gallery.php",'success','Gallery deleted successfully.');
        }else{
            redirect("../gallery.php",'error','Gallery could not be deleted at this moment.');
        }
    } else {
        redirect("../gallery.php","error","Please add data first.");
    }