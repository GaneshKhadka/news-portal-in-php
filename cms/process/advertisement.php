<?php
    require "../../config/init.php";
    require "../inc/checklogin.php";

    // debug($_POST);
    // debug($_FILES);
    $advertisement = new Advertisement;

    if(isset($_POST) && !empty($_POST)){
    // debug($_POST);
    // debug($_FILES,true);

        if(empty($_POST['title'])){
            redirect('../advertisement-form','error','Title field is required.');
        }

        $data = array(
            'title' => sanitize($_POST['title']),
            'link' => sanitize($_POST['link']),
            'start_date' => sanitize($_POST['start_date']),
            'end_date' => sanitize($_POST['end_date']),
            'status' => sanitize($_POST['status']),
            'position' => sanitize($_POST['position']),
        );
        
        // debug($data,true);

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $image_name = uploadImage($_FILES['image'], "advertisement");
            if($image_name){
                $data['image'] = $image_name;
                if(isset($_POST['old_image']) && !empty($_POST['old_image'])){
                    deleteImage($_POST['old_image'],"advertisement");
                }
            }
        }

        $advertisement_id = (isset($_POST['advertisement_id']) && !empty($_POST['advertisement_id'])) ? (int)$_POST['advertisement_id'] : null;
        if($advertisement_id){
            // update
            $act = "updat";
            $advertisement_id = $advertisement->updateData($data, $advertisement_id);

        }else{
            // add
            $act = "add";
            $data['added_by'] = $_SESSION['user_id'];
            $advertisement_id = $advertisement->insertData($data);

        }

        if($advertisement_id){
            redirect('../advertisement.php','success','Advertisement '.$act.'ed successfully.');
        } else {
            redirect('../advertisement.php','error','Sorry! There was problem while '.$act.'ing advertisement.');
        }

    } else if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect("../advertisement.php","error","Invalid Advertisement id.");
        }
        $advertisement_id = $advertisement->getRowById($id);
        if(!$advertisement_id){
            redirect("../advertisement.php","error","Advertisement does not exists or has been already deleted.");
        }

        $del = $advertisement -> deleteRowById($id);
        if($del){
            deleteImage($advertisement_id[0]->image,"advertisement");
            redirect("../advertisement.php",'success','Advertisement deleted successfully.');
        }else{
            redirect("../advertisement.php",'error','Advertisement could not be deleted at this moment.');
        }
    } else {
        redirect("../advertisement.php","error","Please add data first.");
    }