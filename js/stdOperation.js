$("#std-reg-form").submit(function (e) {
    e.preventDefault();
    let data = $("#std-reg-form").serialize();
    console.log(data);
    $.ajax({
        type:"POST",
        url:"include/FrontEndOperation.php?ch=1",
        data:data,
        encode:true,
        success:(response)=>{
            console.log(response)
            dataArr = response.split("||");
            if(dataArr[0] == 1)
            {
                $("#std-reg-form")[0].reset();
                $(".register-form-container .msg div").addClass("success");
                $(".register-form-container .msg .success").text(dataArr[1]);
                setTimeout(()=>{
                    $(".register-form-container .msg div").text("");
                    $(".register-form-container .msg div").removeClass("success");
                },3000);
            }
            else
            {
                $(".register-form-container .msg div").addClass("error");
                $(".register-form-container .msg .error").text(dataArr[1]);
                setTimeout(()=>{
                    $(".register-form-container .msg div").text("");
                    $(".register-form-container .msg div").removeClass("error");
                },3000);
            }
        }
    });
});
$("#std-login-form").submit(function (e) {
    e.preventDefault();
    let data = $("#std-login-form").serialize();
    $.ajax({
        type:"POST",
        url:"include/FrontEndOperation.php?ch=2",
        data:data,
        encode:true,
        success:(response)=>{
            console.log(response);
            dataArr = response.split("||");
            if(dataArr[0] == 1)
            {
                location.href = 'index.php';
            }
            else
            {
                $(".login-form-container .msg div").addClass("error");
                $(".login-form-container .msg .error").text(dataArr[1]);
                setTimeout(()=>{
                    $(".login-form-container .msg div").text("");
                    $(".login-form-container .msg div").removeClass("error");
                },3000);
            }
        }
    });
});