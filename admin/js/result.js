$(document).ready(function() {
    function listTestResult() {
        $.post("include/operation.php?ch=29", {
                ch: "29",
            },
            function(response) {
                console.log(response)
                $("#result-table").html(response);
            }
        )
    }
    listTestResult();

    //--- link for redirect to detail of test result ----//
    $("#result-table").on("click", ".view-more", function () {
        $("#container").load("resultDetail.php?id=" + this.id);
    });

})