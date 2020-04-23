<?php
    require "../../config/init.php";
    require "../inc/checklogin.php";

    // debug($_POST);
    // debug($_FILES);
    $users = new User;

    if(isset($_POST) && !empty($_POST)){

        // debug($_POST,true);

       

        if(isset($_POST['user_id']) && !empty($_POST['user_id'])){

            if(empty($_POST['name'])){
                redirect('../user-form.php','error','Name field is required.');
            }
        }else {
            if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
                redirect('../user-form.php','error','Name, Email and Password fields are required.');
            }
    
            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                redirect('../user-form.php','error','Email format not supported.');
            }
    
            if($_POST['password'] != $_POST['re_password']){
                redirect('../user-form.php','error','Password and re-password does not match.');
            }
        }

        $data = array(
            'name' => sanitize($_POST['name']),
            'role' => "reporter",
            'status' => sanitize($_POST['status']),
        );

        $user_id = (isset($_POST['user_id']) && !empty($_POST['user_id'])) ? (int)$_POST['user_id'] : null;
        if($user_id){
            // update
            $act = "updat";
            $user_id = $users->updateData($data, $user_id);

        }else{
            // add
            $act = "add";
            $data['email'] = $_POST['email'];
            $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user_id = $users->insertData($data);

        }

        if($user_id){
            redirect('../users.php','success','User '.$act.'ed successfully.');
        } else {
            redirect('../users.php','error','Sorry! There was problem while '.$act.'ing users.');
        }

    } else if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect("../users.php","error","Invalid User id.");
        }
        $user_info = $users->getRowById($id);
        if(!$user_info){
            redirect("../users.php","error","User does not exists or has been already deleted.");
        }

        $del = $users -> deleteRowById($id);
        if($del){
            redirect("../users.php",'success','User deleted successfully.');
        }else{
            redirect("../users.php",'error','User could not be deleted at this moment.');
        }
    } else {
        redirect("../users.php","error","Please add data first.");
    }