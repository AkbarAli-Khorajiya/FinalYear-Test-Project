<?php
    session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam25</title>
    <style type="text/css">
        <?php 
            include 'css/exam25.css'; 
        ?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <?php include_once 'include/header.php'; ?>
    <section>
        <div class="container">
            <div class="content">
                <span>Rise above</span>
                <span>the competition</span>
                <span>in the ExamZone</span>
            </div>
            <span class="btn">
                <a href="#">Get Started</a>
            </span>
        </div>
        <div class="img">
            <img src="image/Exams-bro.png" alt="">
        </div>
    </section>
</body>
</html>