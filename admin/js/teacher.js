$(document).ready(function () {

    $(".msg .error").hide();

    $(".edit-modal-container").hide();
    $(".modal-container").hide();

    $(".close").on("click", () => {
        $(".modal-container").hide();
        $(".edit-modal-container").hide();

    });
    $("#add-teacher").on("click", () => {
        $(".modal-container").show();
        // $(".edit-modal-container").show(); on click of edit button

    });
    $("#add-teacher-form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        if (formData.get("teacher-name") == "" || formData.get("teacher-email") == "" || formData.get("teacher-pass") == "" || formData.get("teacher-conPass") == "") {
            $(".msg .error").text("All fields are required");
            $(".msg .error").show();
            setTimeout(() => {
                $(".msg .error").hide();
            }, 2000);
            return false;
        }
        else if (formData.get("teacher-pass").length < 8 || formData.get("teacher-conPass").length < 8) {
            $(".msg .error").text("Password must be 8 characters long");
            $(".msg .error").show();
            setTimeout(() => {
                $(".msg .error").hide();
            }, 2000);
            return false;
        }
        else if (formData.get("teacher-pass") != formData.get("teacher-conPass")) {
            $(".msg .error").text("Password not matched");
            $(".msg .error").show();
            setTimeout(() => {
                $(".msg .error").hide();
            }, 2000);
            return false;
        }
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=24",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                let dataArr = response.split("||");
                if (dataArr[0] == 1) {
                    $(".modal-container").hide();
                    $("#teacher-name").val("");
                    $("#teacher-email").val("");
                    $("#teacher-pass").val("");
                    $("#teacher-conPass").val("");
                    list_all_teacher();
                }
                else {
                    $(".msg .error").text(dataArr[1]);
                    $(".msg .error").show();
                }

            },
        });
    });

});


function list_all_teacher() {
    $.ajax({
        type: "GET",
        url: "include/operation.php?ch=23",
        encode: true,
        success: function (response) {
            $("#teacher-table").html(response);
            $("table .status").each(function () {
                $(this).text() == "De-Active" ? $(this).css("color", "red") : $(this).css("color", "green");
            });
        },
    });
}
list_all_teacher(); // get all tests for first load

function updateStatus(element) {

    let id = element.id;
    console.log(id)
    if (element.className.trim() == "activate") {
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=25",
            data: { id: id, status: 1 },
            encode: true,
            success: function (response) {
                if (response == 1) {
                    list_all_teacher();
                }
            }
        });
    } else if (element.className.trim() == "de-activate") {
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=25",
            data: { id: id, status: 0 },
            encode: true,
            success: function (response) {
                if (response == 1) {
                    list_all_teacher();
                }
            }
        });
    }
}
