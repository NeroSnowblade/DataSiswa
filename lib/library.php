<?php
    session_start();
    
    // URL Inti
    function base_url()
    {
        return "http://localhost/Nero's%20Project/S4/DataSiswaNSB";
    }

    //Notifikasi??
    function flash($type, $msg = "")
    {
        if(empty($msg))
        {
            $msg    = @$_SESSION[$type];
            unset($_SESSION[$type]);
            return $msg;
        }
        else
        {
            $_SESSION[$type] = $msg;
        }
    }

    //Jika User belum Login akan dipindahkan ke Login.php, jika sudah ke Index.php 
    function LoginCheck()
    {
        $username   = @$_SESSION["username"];
        $level      = @$_SESSION["level"];

        if(empty($username) && empty($level))
        {
            header("location: login.php");
        }    
    }
    function UserCheck()
    {
        if(!empty($username) && !empty($level))
        {
            header("location: index.php");
        }
    }



    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $db     = "db_pwpb18";

    $mysqli = mysqli_connect($host,$user,$pass,$db) or die ("Cannot Connect the Databases.");
?>