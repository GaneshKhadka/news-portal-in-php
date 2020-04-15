<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    $user = new User;

    if(isset($_POST) && !empty($_POST)){
        // debug($_POST,true);
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);

        if(!$email){
           redirect("../","error",'Invalid email format'); 
        }
        if(empty($_POST['password'])){
            redirect("../",'error','Password required.');
        }

        $user_info = $user->getUserByEmail($email);
        debug($user_info);

        // $hash = password_hash($_POST['password'],PASSWORD_BCRYPT);

        // $status =  password_verify($_POST['password'], $hash);
        // debug($status,true);
        // $password = sha1($_POST['password']);
    }else{
        redirect("../","error",'Please Login First');
    }