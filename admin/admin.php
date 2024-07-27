<?php
    session_start();
    // if(!isset($_SESSION['loged_in']))
    // {
    //     header('location:admin_login.php');
    // }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/png" href="image/admin/settings.png">
    <style>
        <?php include 'css/admin.css'; ?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
   <header>
        <span>Exam25 </span>
        <button onclick="window.location.href='admin_logout.php'">Log Out</button>
   </header>
   <section>
        <aside>
            <ul>
                <li onclick="$('#container').load('dash.php');"><img src="image/aside/monitor.png"><a href="javascript:void(0)" > Dashboard </a> </li>
                <li onclick="jQuery('#container').load('student.php');"><img src="image/aside/profile.png"> <a href="javascript:void(0)" > Students </a> </li>
                <li onclick="jQuery('#container').load('test.php');"><img src="image/aside/test.png"> <a href="javascript:void(0)" > Test </a> </li>
                <!-- <li onclick="jQuery('#container').load('que.php');"> <img src="image/aside/test.png"><a href="javascript:void(0)" > Questions </a> </li> -->
                <li onclick="jQuery('#container').load('result.php');"><img src="image/aside/student-grades.png"> <a href="javascript:void(0)" > Result </a> </li>
            </ul>
        </aside>
        <div id="container">
            <!-- /// page loaded here /// -->
        </div>   
   </section>
</body>
<script>
    jQuery('#container').load('dash.php');
    const listItems = document.querySelectorAll('li');
    let prevSelectedItem = null;
    listItems.forEach(item => {
    item.addEventListener('click', function() {
    // Reset background color of the previously selected item
        if (prevSelectedItem) 
        {
            prevSelectedItem.style.backgroundColor = '#4B49AC';
        }
        // Set background color of the clicked item
        this.style.backgroundColor = '#7978E9';
        // Update the previously selected item
        prevSelectedItem = this;
        });
    });
</script>
</html>