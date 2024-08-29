$(document).ready(function() {
    $('.modal-container').hide()

    $('#add-student').on('click', () => {
        $('.modal-container').show()
    })
    $('.close').on('click', () => {
        $('.modal-container').hide()
    })
    //add user 
    $("#std-add-form").submit((e)=> { 
        e.preventDefault();
        let data = $("#std-add-form").serialize();
        console.log(data);
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=20",
            data: data,
            encode : true,
            success: (response)=> {
                let dataArr = response.split("||");
                if(dataArr[0] == 1)
                {
                    $(".msg").html("<p class='success'>"+dataArr[1]+"</p>");
                }
                else
                {
                    $(".msg").html("<p class='error'>"+dataArr[1]+"</p>");
                }
            }
        });
    });
})
