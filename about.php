<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        <?php include 'css/about.css';?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <?php include_once 'include/loader.php';?>
    <?php include 'include/header.php';?>
    <section>
        <div class="container">
                <h1>About us</h1>
                <br>
                <p><b>ExamZone</b> is your one-stop destination for comprehensive online test preparation. We're dedicated to helping students and professionals achieve their academic and career goals through effective and engaging practice tests.</p>
        </div>
        <div class="img-container">
            <img src="image/about.png" alt="About us">
        </div>
    </section>
</body>
</html>