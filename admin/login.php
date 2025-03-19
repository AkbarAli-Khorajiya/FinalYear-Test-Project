<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style type="text/css">
        <?php include_once 'css/login.css';
        ?>
    </style>
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
</head>

<body>
    <form id="loginForm" action="javascript:void(0)">
        <div class="alert"></div>
        <div class="head">Login</div>
        <div class="wrapper">Sign in to your account to access the admin dashboard </div>
        <div class="input-grp">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter your email">
        </div>
        <div class="input-grp">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
        </div>
        <div class="btn">
            <input type="submit" value="Log in" id="btnLogIn">
        </div>
    </form>
    <script src="js/login.js" type="text/javascript"></script>
</body>

</html>