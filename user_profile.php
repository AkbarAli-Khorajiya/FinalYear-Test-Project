<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include_once 'css/user_profile.css';?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
<!-- Test Popup -->
    <div class="popup" id="popup">
        <div class="popup-test">
            <div class="test-head">
                <span class="test-name">PHP TEST</span>
                <span class="test-date">22/09/2024</span>
            </div>
            <div class="test-content">
                <table>
                    <tr>
                        <td>Attempted Question :</td><td>09</td>
                    </tr>
                    <tr>
                        <td>Total Questions :</td><td>20</td>
                    </tr>
                    <tr>
                        <td>Right Answer :</td><td>07</td>
                    </tr>
                    <tr>
                        <td>Total Marks :</td><td>14</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <header>
        <span> <a href="index.php">Exam25</a> </span>
        <nav>
            <a href="index.php">HOME</a>
            <a href="student_login.php">EXAM</a>
            <a href="#">EVENTS</a>
            <a href="exam25_about.php">ABOUT</a>
            <a href="#">CONTACT</a>
               <!-- user profile menu -->
            <?php 
                if(!isset($_SESSION['userId']) && empty($_SESSION['userId']))
                {
            ?>
                <a href="student_reg.php">REGISTER</a>
            <?php
                }
                else
                {
            ?>
            <img src="image/userprofile/user.png" class="img" alt="">
            <div class="user-menu">
                <span class="profile"> <img src="image/userprofile/profile.png"> My profile</span>
                <hr width="100%">
                <span class="user-data">
                    <span class="user-name"><?php echo $_SESSION['userName'];?></span>
                    <span class="user-email"><?php echo $_SESSION['userMail'];?></span>
                </span>
                <hr width="100%">
                <span class="logout"> <img src="image/userprofile/logout.png"> Log-out</span>
            </div>
            <?php
                }
            ?>
        </nav>
    </header>
    <section>
        <div class="container">
            <div class="profile-container">
                <div class="profile-content">
                    <div class="img">
                        <img src="image/userprofile/MALE.jpg" alt="">
                    </div>
                    <div class="bio-data">
                            <span class="name"><?php echo $_SESSION['userName']; ?></span>
                            <span class="email"><?php echo $_SESSION['userMail']; ?></span>
                    </div>
                </div>
            </div>
            <div class="test-container">
                <span class="heading">--- Given Test ---</span>
                <div class="test-detail">
                    <span class="test-name">PHP TEST</span>
                    <span class="test-date">22/09/2024</span>
                </div>
            </div>
        </div>
    </section>
    <script>
        <?php include 'js/user_profile.js';?>
    </script>
</body>
</html>