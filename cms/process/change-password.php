<?php
    require "../../config/init.php";
    require "../inc/checklogin.php";

    // debug($_POST);
    // debug($_FILES);
    $users = new User;

    if(isset($_POST) && !empty($_POST)){
        if(empty($_POST['password']) || empty($_POST['re_password']) || $_POST['password'] != $_POST['re_password'] || empty($_GET['id'])){
            redirect('../users.php','Password and Repassword should not be empty and should be equal.');
        }
        $data = array(
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
        );

        $id = (int)$_GET['id'];
        if($id <= 0 ){
            redirect('../users.php','error','Invalid User Id.');
        }

        $user_info = $users->getRowById($id);

        if(!$user_info){
            redirect('../users.php','error','User does not exits.');
        }

        $status = $users->updateData($data, $_GET['id']);
        
        if($status){

            if($_GET['id'] == $_SESSION['user_id']){
                redirect('../logout.php');
            }
            redirect('../users.php','success','Password changed successfully.');
        } else {
            redirect('../users.php','error','Sorry! There was problem while updating password.');
        }
    }else{
        redirect('../users.php','error','Select a  user first.');
    }
