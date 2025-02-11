<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    <?php include 'css/admin_login.css';
    ?>
    </style>
</head>

<body>
    <div class="login-card">
        <h1>Admin Login</h1><br>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" class="login login-submit" value="Login">
        </form>
        <div class="login-help">

        </div>
    </div>
</body>

</html>