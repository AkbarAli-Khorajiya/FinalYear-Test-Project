$(document).ready(function () {
    console.log("firstname");
    function list_all_teacher() {
        $.ajax({
            type: "GET",
            url: "include/operation.php?ch=23",
            encode: true,
            success: function (response) {
                $("#techer-table").html(response);
                // //----- Update test show---//
                // $(".edit-test").on("click", () => {
                //     $(".edit-modal-container").show();
                // });
                console.log(response);
            },
        });
    }
    list_all_teacher(); // get all tests for first load
    $(".edit-modal-container").hide();
    $(".modal-container").hide();

    $(".close").on("click", () => {
        $(".modal-container").hide();
        $(".edit-modal-container").hide();

    });
    $("#add-teacher").on("click", () => {
        // $(".modal-container").show();
        $(".edit-modal-container").show();

    });
});