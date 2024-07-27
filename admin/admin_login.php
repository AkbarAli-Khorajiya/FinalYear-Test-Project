<?php 
    include 'include/database.php';
    $alert='';
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) 
        {
            session_start();
            $_SESSION['loged_in']= true;
            header('location:admin.php');
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
    <title>Login</title>
    <style>
        <?php include 'css/admin_login.css';?>
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Admin Login</h1><br>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" class="login login-submit" value="Login">
        </form>
        <div class="login-help">
            <?php echo $alert;?>
        </div>
    </div>
</body>
</html>