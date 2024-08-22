$("#std-reg-form").submit(function (e) {
    e.preventDefault();
    let stdName = $("#name").val();
    let stdEmail = $("#email").val();
    let stdGender = $("#gender").val();
    let data = $("#std-reg-form").serialize();
    if(stdName == "" || stdEmail == "" || stdGender == "")
    {
        $(".msg").text("*Fill all fields");
        $(".msg").addClass(".error");
    }
    else
    {
        $.ajax({
            type:"POST",
            url:"include/FrontEndOperation.php?ch=1",
            data:data,
            encode:true,
            success:(response)=>{
                console.log(response);
                dataArr = response.split("||");
                if(dataArr[0] == 1)
                {
                    $(".msg div").addClass("success");
                    $(".msg .success").text(dataArr[1]);
                    setTimeout(()=>{
                        $(".msg div").text("");
                        $(".msg div").removeClass("success");
                    },3000);
                }
                else
                {
                    $(".msg div").addClass("error");
                    $(".msg .error").text(dataArr[1]);
                    setTimeout(()=>{
                        $(".msg div").text("");
                        $(".msg div").removeClass("error");
                    },3000);
                }
            }
        });
    }
});