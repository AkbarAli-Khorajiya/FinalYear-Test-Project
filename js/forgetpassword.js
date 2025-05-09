$(document).ready(function () {
    $("#loginForm").submit(function (e) { 
        e.preventDefault();
        let email = $("#loginForm #email").val();
        if(email.trim()==""){
            $("#loginForm .alert").text("Field can't be blank");
            $("#loginForm .alert").addClass('warning');
            $("#loginForm .alert").show();
            setTimeout(() => {
                $("#loginForm .warning").fadeOut();
            }, 1500);
        }
        else{
            const data = $("#loginForm").serialize();
            // console.log(data);
        
            $.ajax({
                type: "POST",
                url: "include/FrontEndOperation.php?ch=8",
                data: data,
                encode: true,
                beforeSend:function(){
                    $('.loader-container').show();
                },
                success: function (response) {
                    console.log(response)
                    let responseArr = response.split("||");
                    // console.log(responseArr)
                    if(responseArr[0].substr(responseArr[0].length-1) == 1)
                    {
                        $("#loginForm").css("display","none");                
                        $("#otpForm").css("display", "block");
                    }
                    else{
                        $("#loginForm .alert").text(responseArr[1]);
                        $("#loginForm .alert").addClass('warning');
                        $("#loginForm .alert").show();
                        setTimeout(() => {
                            $(".warning").fadeOut();
                        }, 1500);
                    }  
                },
                complete: function(){
                    $('.loader-container').fadeOut(1000);
                }
            });
        }
    });
    $("#otpForm").submit(function (e) { 
        e.preventDefault();
        let otp = $("#otpForm #otp").val();
        if(otp == ""){
            $("#otpForm .alert").text("Field can't be blank");
            $("#otpForm .alert").addClass('warning');
            $("#otpForm .alert").show();
            setTimeout(() => {
                $("#otpForm .warning").fadeOut();
            }, 1500);
        }
        const regex = /^\d+$/;
        if(!regex.test(otp))
        {
            $("#otpForm .alert").text("Invalid OTP");
            $("#otpForm .alert").addClass('warning');
            $("#otpForm .alert").show();
            setTimeout(() => {
                $("#otpForm .warning").fadeOut();
            }, 1500);
        }
        else{
            let data = $("#otpForm").serialize();
            $.ajax({
                type: "POST",
                url: "include/FrontEndOperation.php?ch=6",
                data: data,
                encode:true,
                beforeSend:function(){
                    $('.loader-container').show();
                },
                success: function (response) {
                    let responseArr = response.split("||");
                    if(responseArr[0]==1){
                        $("#otpForm").css("display","none");                
                        $("#forgetPasswordForm").css("display", "block");
                    }
                    else{
                        $("#otpForm .alert").text(responseArr[1]);
                        $("#otpForm .alert").addClass('warning');
                        $("#otpForm .alert").show();
                        setTimeout(() => {
                            $("#otpForm .warning").fadeOut();
                            
                        }, 1500);
                    }
                },
                complete: function(){
                    $('.loader-container').fadeOut(1000);
                }
            });
        }
    });
    $("#forgetPasswordForm").submit(function (e) { 
        e.preventDefault();
        let password = $("#forgetPasswordForm #newPassword").val();
        let confirmPassword = $("#forgetPasswordForm #confirmNewPassword").val();
        if(password == ""){
            $("#forgetPasswordForm .alert").text("Field can't be blank");
            $("#forgetPasswordForm .alert").addClass('warning');
            $("#forgetPasswordForm .alert").show();
            setTimeout(() => {
                $("#forgetPasswordForm .warning").fadeOut();
            }, 1500);
        }
        if(password.length < 8 || password.length > 20 )
        {
            $("#forgetPasswordForm .alert").text("Password must be between 8 to 20 characters");
            $("#forgetPasswordForm .alert").addClass('warning');
            $("#forgetPasswordForm .alert").show();
            setTimeout(() => {
                $("#forgetPasswordForm .warning").fadeOut();
            }, 1500);
        }
        if(password != confirmPassword)
        {
            $("#forgetPasswordForm .alert").text("Password must be same");
            $("#forgetPasswordForm .alert").addClass('warning');
            $("#forgetPasswordForm .alert").show();
            setTimeout(() => {
                $("#forgetPasswordForm .warning").fadeOut();
            }, 1500);
        }
        else{
            let data = $("#forgetPasswordForm").serialize();
            $.ajax({
                type: "POST",
                url: "include/FrontEndOperation.php?ch=9",
                data: data,
                encode:true,
                beforeSend:function(){
                    $('.loader-container').show();
                },
                success: function (response) {
                    console.log(response)
                    let responseArr = response.split("||");
                    if(responseArr[0]==1){
                        $("#forgetPasswordForm .alert").text(responseArr[1]);
                        $("#forgetPasswordForm .alert").addClass('success');
                        $("#forgetPasswordForm .alert").show();
                        setTimeout(() => {
                            $("#forgetPasswordForm .success").fadeOut();
                            window.location.href = "index";
                        }, 1500);
                    }
                    else{
                        $("#forgetPasswordForm .alert").text(responseArr[1]);
                        $("#forgetPasswordForm .alert").addClass('warning');
                        $("#forgetPasswordForm .alert").show();
                        setTimeout(() => {
                            $("#forgetPasswordForm .warning").fadeOut();
                            
                        }, 1500);
                    }
                },
                complete: function(){
                    $('.loader-container').fadeOut(1000);
                }
            });
        }
    });    
});