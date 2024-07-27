<?php
    include 'include/database.php';
    $alert='';
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']))
    {
        $username = $_POST['uname'];
        $password = $_POST['password'];
        $query = "SELECT * FROM student_reg WHERE u_name = '$username' AND password = '$password'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) 
        {
            session_start();
            $_SESSION['student_login']= true;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['s_id']=$row['reg_id'];
            header('location:exam_main.php');
        } 
        else 
        {
            $alert="Login failed";
        }
    }
    mysqli_close($link);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam25</title>
    <style>
        <?php include 'css/student_login.css'; ?>
    </style>
</head>
<body>
    <div class="box">
        <img src="image/8.png">
    </div>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <ul>
                <li> <label>Username</label> </li>
                <li> <input type="text" name="uname" placeholder="Enter Username" required> </li>
                <li> <label>Password</label> </li>
                <li> <input type="password" name="password" placeholder="Enter Password" required> </li>
                <li> <input type="submit" value="LOGIN" name="login"></li>
                <li> <a href="#">Forget Password?</a> </li>
                <li class="error"><?php echo $alert;?></li>
            </ul>
        </form>
    </div>
    <script>
        <?php include 'js/exam25_exam1.js' ?>
    </script>
</body>
</html>