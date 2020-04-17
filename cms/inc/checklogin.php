<?php
    $user = new User;
    if(!isset($_SESSION, $_SESSION['token']) || empty($_SESSION['token'])){

            if(isset($_COOKIE, $_COOKIE['_au'])){
                $cookie_token = $_COOKIE['_au'];
                $user_info = $user->getUserByCookieToken($cookie_token);

                if($user_info){

                    setSession('user_id', $user_info[0]->id);
                    setSession('name', $user_info[0]->name);
                    setSession('email', $user_info[0]->email);
                    setSession('role', $user_info[0]->role);
    
                    $token = generateRandomString(100);
                    setSession("token",$token);
    
                        setcookie("_au", $token, (time()+860000), "/"); //cookie set for 10 days
                        $data = array(
                            'remember_token' => $token
                        );
                        $user->updateData($data, $user_info[0]->id);    

                }else{
                    setcookie("_au","",time()-60, "/");
                    redirect("./","error","Please clear your cookie before login");
                }
            }else{
                redirect('./','error','Please login first.');
            }
    }
  