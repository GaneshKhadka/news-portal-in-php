<?php
    require "../../config/init.php";
    require "../inc/checklogin.php";

    // debug($_POST);
    // debug($_FILES);
    $category = new Category;

    if(isset($_POST) && !empty($_POST)){
        if(empty($_POST['title'])){
            redirect('../category-form','error','Title field is required.');
        }

        $data = array(
            'title' => sanitize($_POST['title']),
            'summary' => sanitize($_POST['summary']),
            'status' => sanitize($_POST['status']),
            'added_by' => $_SESSION['user_id']
        );

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $image_name = uploadImage($_FILES['image'], "category");
            if($image_name){
                $data['image'] = $image_name;
            }
        }

        $cat_id = $category->insertData($data);

        if($cat_id){
            redirect('../category.php','success','Category added successfully.');
        } else {
            redirect('../category.php','error','Sorry! There was problem while adding category.');
        }

    } else if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect("../category.php","error","Invalid Category id.");
        }
        $cat_info = $category->getRowById($id);
        if(!$cat_info){
            redirect("../category.php","error","Category does not exists or has been already deleted.");
        }

        $del = $category -> deleteRowById($id);
        if($del){
            deleteImage($cat_info[0]->image,"category");
            redirect("../category.php",'success','Category deleted successfully.');
        }else{
            redirect("../category.php",'error','Category could not be deleted at this moment.');
        }
    } else {
        redirect("../category.php","error","Please add data first.");
    }