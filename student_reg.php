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
    <?php include_once 'include/loader.php';?>
    <div class="container">
        <!--Data or Content-->
        <div class="box-1">
            <div class="content-holder">
                <h2>ExamZone</h2>
                <p class="sub-content">Not Register yet?<br/>Then Register</p>
                <button class="button-2" onclick="login()">Login</button>
                <button class="button-1" onclick="register()">Register</button>
            </div>
        </div>
        <!--Forms-->
        <div class="box-2">
            <!--Create Container for Signup form-->
            <div class="register-form-container">
                <form id="std-reg-form">
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
                    <span class="login-wrapper">Already Registered? Then <a onclick="login()" href="javascript:void(0)">Login</a></span>
                </form>
            </div>
            <div class="login-form-container">
                <form id="std-login-form">
                    <h1>Login</h1>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" class="input-field login" required>
                    </div>
                    <div class="input-group">
                        <label for="password"> Password</label>
                        <input type="password" name="password" placeholder="Password" class="input-field login" requ>
                        <span class="forget-wrapper"> <a href="forgetpassword">Forget password?</a></span>
                    </div>
                    <button class="login-button" id="submit-login" type="submit">Login</button>
                    <span class="register-wrapper">Not Register yet? Then <a onclick="register()" href="javascript:void(0)">Register</a></span>
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
        document.querySelector(".container").style.cssText = "background:linear-gradient(45deg, #3235ad, #a7aaee6c)";
        document.querySelector(".button-1").style.cssText = "display: none";
        document.querySelector(".button-2").style.cssText = "display: block";
        document.querySelector(".sub-content").innerHTML = "Already Registered?<br/>Then login";
    };
    function login()
    {
        document.querySelector(".register-form-container").style.cssText = "display: none;";
        document.querySelector(".login-form-container").style.cssText = "display: block;";
        document.querySelector(".container").style.cssText = "background:linear-gradient(75deg,#a7abee, #3235ad,#3235ad)";
        document.querySelector(".button-2").style.cssText = "display: none";
        document.querySelector(".button-1").style.cssText = "display: block";
        document.querySelector(".sub-content").innerHTML = "Not Register yet?<br/>Then Register";
    };
    $("#sname").focus(()=> {
        switch($(".container").width()){
            case 800:
                $("#sname").css('width', '222px');
                $("#fname").css('width', '58px');
                $("#lname").css('width', '58px');
                break;
            
            case 600:
                $("#sname").css('width', '158px');
                $("#fname").css('width', '41px');
                $("#lname").css('width', '41px');
                break;
            case 300:
                $("#sname").css('width', '158px');
                $("#fname").css('width', '41px');
                $("#lname").css('width', '41px');
                break;
        }
    });
    $("#fname").focus(()=> {
        switch($(".container").width()){
            case 800:
                $("#sname").css('width', '58px');
                $("#fname").css('width', '222px');
                $("#lname").css('width', '58px');
                break;
            
            case 600:
                $("#sname").css('width', '41px');
                $("#fname").css('width', '158px');
                $("#lname").css('width', '41px');
                break;
            case 300:
                $("#sname").css('width', '41px');
                $("#fname").css('width', '158px');
                $("#lname").css('width', '41px');
                break;
        }
    });
    $("#lname").focus(()=> {
        switch($(".container").width()){
            case 800:
                $("#sname").css('width', '58px');
                $("#fname").css('width', '58px');
                $("#lname").css('width', '222px');
                break;
            
            case 600:
                $("#sname").css('width', '41px');
                $("#fname").css('width', '41px');
                $("#lname").css('width', '158px');
                break;
            case 300:
                $("#sname").css('width', '41px');
                $("#fname").css('width', '41px');
                $("#lname").css('width', '158px');
                break;
        }
    });
    $(".name").blur(()=>{
        switch($(".container").width()){
            case 800:
                $(".name").css('width','113px');
                break;
            
            case 600:
                $(".name").css('width','81px');
                break;
            
            case 300:
                $(".name").css('width','81px');
                break;
        }
    });
</script>
</html>
