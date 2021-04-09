<?php 
session_start();
class AuthController{

    public static function isLogged(){
        if(!isset($_SESSION['auth'])){
            header('location:index.php?action=login');
            exit;
        }
    }

    public static function logout(){
        unset($_SESSION['auth']);
        header('location:index.php?action=login');
    }

    public static function accessUser(){
        if($_SESSION['auth']->id_g == 2){
            header('location:index.php?action=login');
            exit;
        }
    }
}

?>