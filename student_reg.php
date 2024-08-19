<?php include 'include/reg_valid.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        <?php include 'css/student_reg.css'?>
    </style>
</head>
<body>
    <header>
        <span onclick="window.location.href = 'index.php';">Exam25</span>
        <img src="image/3.png" alt="">
    </header>
    <div class="container">
        <form action="#" method="post">
            <ul>
                <li> <h3>Registration</h3> </li>
                <li> <input type="text" class="style" id="name" name="name" placeholder="Enter your name" required> </li>
                <li> <input type="email" class="style" id="email" name="email" placeholder="Enter your email" required> </li>
                <li> 
                    <select name="gender" id="gender" class="style"> 
                        <option value="">Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                    </select> 
                </li>
                <li> <input type="submit" value="Register" name="register"></li>
                <li class="success"></li>
            </ul>
        </form>
    </div>
</body>
</html>