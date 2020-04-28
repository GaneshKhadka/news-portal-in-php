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

        if($user_info){
            // user exists
            if(password_verify($_POST['password'], $user_info[0]->password)){
                // password match
                setSession('user_id', $user_info[0]->id);
                setSession('name', $user_info[0]->name);
                setSession('email', $user_info[0]->email);
                setSession('role', $user_info[0]->role);

                $token = generateRandomString(100);
                setSession("token",$token);

                if(isset($_POST['remember_me']) && !empty($_POST['remember_me'])){
                    // cookie
                    setcookie("_au", $token, (time()+860000), "/"); //cookie set for 10 days
                    $data = array(
                        'remember_token' => $token
                    );
                    $user->updateData($data, $user_info[0]->id);
                }

                // debug($_SESSION,true);

                if($user_info[0]->role == 'admin'){
                    redirect('../dashboard.php','success','Welcome to admin panel.');
                } else {
                    redirect('../reporter-dashboard.php','success','Welcome to admin panel.');
                }

            } else{
                redirect("../",'error','Credentials doesnot match');
            }
        } else{
            redirect("../",'error','Credentials doesnot match');
        }
        // debug($user_info);

        // $hash = password_hash($_POST['password'],PASSWORD_BCRYPT);

        // $status =  password_verify($_POST['password'], $hash);
        // debug($status,true);
        // $password = sha1($_POST['password']);
    }else{
        redirect("../","error",'Please Login First');
    }