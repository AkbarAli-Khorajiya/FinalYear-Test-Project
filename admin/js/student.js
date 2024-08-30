$(document).ready(function() {
    $('.modal-container').hide()

    $('#add-student').on('click', () => {
        $('.modal-container').show()
    })
    $('.close').on('click', () => {
            $('.modal-container').hide()
        })
        // hide msg p tag
    $(".msg p").hide();
    //add user 
    $("#std-add-form").submit((e) => {
        e.preventDefault();
        let data = $("#std-add-form").serialize();
        console.log(data);
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=20",
            data: data,
            encode: true,
            success: (response) => {
                let dataArr = response.split("||");
                if (dataArr[0] == 1) {
                    $("#std-add-form")[0].reset();
                    $(".msg .success").text(dataArr[1]);
                    $(".msg .success").show();
                    setTimeout(() => {
                        $(".msg .success").hide();
                    }, 2000);
                    $('.modal-container').hide()
                    listUser();
                } else {
                    $(".msg .error").text(dataArr[1]);
                    $(".msg .error").show();
                    setTimeout(() => {
                        $(".msg .error").hide();
                    }, 2000);
                }
            }
        });
    });
    $("#search").keyup(function() {
        let data = $("#search").val();
        $.post(
            "include/operation.php?ch=21", {
                data: data,
            },
            function(response) {
                $("#user-table").html(response);
            }
        );
    });
});
function listUser() {
    $.post("include/operation.php?ch=21", {
            ch: "21",
        },
        function(response) {
            $("#user-table").html(response);
            $("table .status").each(function() {;
                $(this).text() == "De-Active" ? $(this).css("color", "red") : $(this).css("color", "green");
            });
        }
    )
}
listUser();

function updateStatus(element) {

    let id = element.id;
    if (element.className == "activate") {
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=22",
            data: { id: id, status: 1 },
            encode: true,
            success: function(response) {
                if (response == 1) {
                    listUser();
                }
            }
        });
    } else if (element.className == "de-activate") {
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=22",
            data: { id: id, status: 0 },
            encode: true,
            success: function(response) {
                if (response == 1) {
                    listUser();
                }
            }
        });
    }
}