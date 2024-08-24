<?php
    session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam25</title>
    <style>
        <?php include 'css/exam25.css' ?>
    </style>
</head>
<body>
    <header>
        <span> <a href="exam25_home.php">Exam25</a> </span>
        <nav>
            <a href="index.php">HOME</a>
            <a href="student_login.php">EXAM</a>
            <a href="#">RESULT</a>
            <a href="exam25_about.php">ABOUT</a>
            <?php 
                if(isset($_SESSION['userId']) && !empty($_SESSION['userId']))
                {
            ?>
                <a href="#">USER</a>
            <?php
                }
                else
                {
            ?>
                <a href="student_reg.php">Register</a>
            <?php
                }
            ?>    
        </nav>
    </header>
    <section>
        <div class="content">
            <span>Welcome to Exam25,</span>
            <p>the online platform for taking exams in various subjects. Whether you are a student, a professional, or a lifelong learner, Exam25 can help you test your knowledge, track your progress, and challenge yourself with harder questions. Exam25 is easy to use, reliable, and fun. Join us today and start your online exam journey!</p>
            <a href="student_reg.php">Let's Start</a>
        </div>
        <div class="container">
            <img src="image/homepage.png" >
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>