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
                alert(dataArr[1])
            }
            else
            {
                alert(dataArr[1])
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
                alert(dataArr[1]);
            }
        }
    });
});