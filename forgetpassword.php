<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style type="text/css">
        <?php include_once 'css/examLogin.css'; ?>
    </style>
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
</head>
<body>
    <?php include_once 'include/loader.php'; ?>
    <form id="loginForm" action="javascript:void(0)">
        <div class="alert"></div>
        <div class="head">Login</div>
        <div class="wrapper">Enter your email to receive a one-time password.</div>
        <div class="input-grp">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="btn">
            <input type="submit" value="Send OTP" id="btnOtp">
        </div>
        <input type="text" name="otp" value="true" hidden>
    </form>
    <form id="otpForm" style="display:none" action="javascript:void(0)">
        <div class="alert"></div>
        <div class="head">Verify OTP</div>
        <div class="wrapper">Enter the one-time password sent to your email.</div>
        <div class="input-grp">
            <label for="otp">One-Time Password</label>
            <input type="text" name="otp" id="otp" placeholder="Enter OTP" required>
            <!-- displaying send again option for otp -->
            <!-- <span class="otp-timer"> <a href="#" id="btnSendAgainOtp">Send again</a> 00:30</span> -->
        </div>
        <div class="btn">
            <input type="submit" value="Verify OTP" id="btnVerifyOtp">
        </div>
    </form>
    <form id="forgetPasswordForm" style="display:none" action="javascript:void(0)">
        <div class="alert"></div>
        <div class="head">Reset Password</div>
        <div class="wrapper">Enter new password to change password</div>
        <div class="input-grp">
            <label for="newPassword">New Password</label>
            <input type="password" name="newPassword" id="newPassword" required>
        </div>
        <div class="input-grp">
            <label for="newPassword">Confirm New Password</label>
            <input type="password" name="confirmNewPassword" id="confirmNewPassword" required>
        </div>
        <div class="btn">
            <input type="submit" value="Reset Password" id="btnResetPassword">
        </div>
    </form>
    <script src="js/forgetpassword.js" type="text/javascript"></script>
</body>
</html>