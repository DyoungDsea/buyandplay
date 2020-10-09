<?php
session_start();
require("../config.php");
if(isset($_POST['log'])){
if(!empty($_POST['password1']) && !empty($_POST['password2'])){
    $id=$_POST['id'];
    $password1=md5($_POST['password1']);
    $password2=md5($_POST['password2']);
    $correctoldpass=$_POST['pid'];
    $arg=md5($_POST['oldpassword']);
    if($correctoldpass===$arg){
        if($password1==$password2){
            $query=$conn->prepare("update admin_accounts set pword=? where id=?");
            $query->bind_param('si',$password1,$id);
                if($query->execute()){
                    $_SESSION['msgs']="Password Changed successfully";
                }else{
                    $_SESSION['msg']="Failed! Please try again";
                }
        }else{
            $_SESSION['msg']="Passwords do not match";
            
        }
    }else{
        $_SESSION['msg']="Old password is incorrect";
    }
   
    echo "<script>history.back();</script>";
}
}else{
    header("Location: index");
}
?>