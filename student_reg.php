<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        <?php include 'css/font/robotoFont.css';?>
        <?php include 'css/student_reg.css'?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <div class="container">
        <!--Data or Content-->
        <div class="box-1">
            <div class="content-holder">
                <h2>Exam25</h2>
                <p class="sub-content">Already Registered?<br/>Then login</p>
                <button class="button-2" onclick="login()">Login</button>
                <button class="button-1" onclick="register()">Register</button>
            </div>
        </div>
        <!--Forms-->
        <div class="box-2">
            <!--Create Container for Signup form-->
            <div class="register-form-container">
                <form id="std-reg-form">
                    <div class="msg">
                        <div></div>
                    </div>
                    <h1>Register</h1>
                    <input type="text" name="surName" id="sname" placeholder="Surname"  class="input-field name " required> 
                    <input type="text" name="firstName" id="fname" placeholder="First name"  class="input-field name " required>
                    <input type="text" name="lastName" id="lname" placeholder="Last name"  class="input-field name " required>
                    <br>
                    <input type="email" name="email" placeholder="Email" class="input-field" required> <br>
                    <input type="password" name="password" placeholder="Password" class="input-field password" required>
                    <input type="password" name="confirm-password" placeholder="Confirm Password" class="input-field password" required> <br>
                    <select name="gender"  class="input-field dropdownlist" required>
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <select name="class" class="input-field dropdownlist" required>
                        <option value="">Class</option>
                        <option value="First-year">First-year</option>
                        <option value="Second-year">Second-year</option>
                        <option value="Third-year">Third-year</option>
                    </select>
                    <button class="register-button" id="submit-reg" type="submit">Register</button>
                </form>
            </div>
            <div class="login-form-container">
                <form id="std-login-form">
                    <div class="msg">
                        <div></div>
                    </div>
                    <h1>Login</h1>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" class="input-field login" required>
                    </div>
                    <div class="input-group">
                        <label for="password"> password</label>
                        <input type="password" name="password" placeholder="Password" class="input-field login" requ>
                    </div>
                    <button class="login-button" id="submit-login" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>    
</body>   
<script>
    <?php include_once "js/stdOperation.js"; ?>
    function register()
    {
        document.querySelector(".login-form-container").style.cssText = "display: none;";
        document.querySelector(".register-form-container").style.cssText = "display: block;";
        document.querySelector(".container").style.cssText = "background:linear-gradient(to top,rgb(0,109,176), rgb(0,147,175))";
        document.querySelector(".button-1").style.cssText = "display: none";
        document.querySelector(".button-2").style.cssText = "display: block";
        document.querySelector(".sub-content").innerHTML = "Already Registered?<br/>Then login";
    };
    function login()
    {
        document.querySelector(".register-form-container").style.cssText = "display: none;";
        document.querySelector(".login-form-container").style.cssText = "display: block;";
        document.querySelector(".container").style.cssText = "background: linear-gradient(to bottom,rgb(0,109,176), rgb(0,147,175))";
        document.querySelector(".button-2").style.cssText = "display: none";
        document.querySelector(".button-1").style.cssText = "display: block";
        document.querySelector(".sub-content").innerHTML = "Not Register yet?<br/>Then Register";
    };
    $("#sname").focus(()=> {
        $("#sname").css('width', '222px');
        $("#fname").css('width', '58px');
        $("#lname").css('width', '58px');
    });
    $("#fname").focus(()=> {
        $("#sname").css('width', '58px');
        $("#fname").css('width', '222px');
        $("#lname").css('width', '58px');
    });
    $("#lname").focus(()=> {
        $("#sname").css('width', '58px');
        $("#fname").css('width', '58px');
        $("#lname").css('width', '222px');
    });
    $(".name").blur(()=>{
        $(".name").css('width','113px');
    });
</script>
</html>
