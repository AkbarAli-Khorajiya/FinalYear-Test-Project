<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        <?php include 'css/student_reg.css'?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <header>
        <span onclick="window.location.href = 'index.php';">Exam25</span>
        <img src="image/3.png" alt="">
    </header>
    <div class="container">
        <form action="javascript:void(0)" id="std-reg-form">
            <div class="msg">
                <div>
                </div>
            </div>
            <ul>
                <li> <h3>Registration</h3> </li>
                <li> <input type="text" class="style" id="name" name="name" placeholder="Enter your name" required> </li>
                <li> <input type="email" class="style" id="email" name="email" placeholder="Enter your email" required> </li>
                <li> 
                    <select name="gender" id="gender" class="style" required> 
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select> 
                </li>
                <li> <input type="submit" value="Register" name="register"></li>
                <li class="msg"></li>
            </ul>
        </form>
    </div>
</body>
<script>
    <?php include_once "js/stdOperation.js"; ?>
</script>
</html>