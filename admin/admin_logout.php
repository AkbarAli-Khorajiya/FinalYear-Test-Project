<?php
    session_start();
    if(isset($_SESSION['loged_in']))
    {
        unset($_SESSION['loged_in']);
    }
    else if($_SESSION['student_login'])
    {
        unset($_SESSION['student_login']);
    }
    else
    {
        session_unset();
        session_destroy();
    }
    header('location:admin_login.php');
    exit();
?>