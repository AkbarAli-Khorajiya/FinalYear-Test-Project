$(document).ready(function () {
    
    $("#loginForm").submit(function (e) { 
        e.preventDefault();
        let email = $("#loginForm #email").val();
        let password = $("#loginForm #password").val();
        if(password.trim() == "" || email.trim()==""){
            $("#loginForm .alert").text("Field can't be blank");
            $("#loginForm .alert").addClass('warning');
            $("#loginForm .alert").show();
            setTimeout(() => {
                $("#loginForm .alert").fadeOut();
            }, 1500);
        }
        else{
            const data = $("#loginForm").serialize();
            console.log(data);
            $.ajax({
                type: "POST",
                url: "include/FrontEndOperation.php?ch=2",
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
                        $(".alert").text(responseArr[1]);
                        $(".alert").addClass('warning');
                        $(".alert").show();
                        setTimeout(() => {
                            $(".alert").fadeOut();
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
                $("#otpForm .alert").fadeOut();
            }, 1500);
        }
        const regex = /^\d+$/;
        if(!regex.test(otp))
        {
            $("#otpForm .alert").text("Invalid OTP");
            $("#otpForm .alert").addClass('warning');
            $("#otpForm .alert").show();
            setTimeout(() => {
                $("#otpForm .alert").fadeOut();
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
                    console.log(response)
                    let responseArr = response.split("||");
                    if(responseArr[0]==1){
                        $(".alert").text(responseArr[1]);
                        $(".alert").addClass('success');
                        $(".alert").show();
                        setTimeout(() => {
                            $(".alert").fadeOut();
                        }, 1500);
                    }
                    else{
                        $(".alert").text(responseArr[1]);
                        $(".alert").addClass('warning');
                        $(".alert").show();
                        setTimeout(() => {
                            $(".alert").fadeOut();
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