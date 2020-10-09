<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['login'])):
    $em = clean($_POST['email']);
    $pass = md5(clean($_POST['pass']));

        $x = $conn->query("SELECT * FROM `members_register` WHERE demail='$em' AND pword='$pass'");
        if($x->num_rows>0){
            $v = $x->fetch_assoc();
            // $_SESSION['msgs'] = 'Oops! try again later';
            $_SESSION['user']=true;
            $_SESSION['userId']=$v['userid'];
                if(isset($_SESSION['current_page']) && $_SESSION['current_page'] !=''){
                header("Location: ". $_SESSION['current_page']);                
                    require 'vip-past.php';
                }else{
                header("Location: dashboard"); 
                    require 'vip-past.php'; 
                }
        }else{
            $_SESSION['msg'] = 'Oops! try again later';
            header("Location: login");
        }
    


endif;
endif;