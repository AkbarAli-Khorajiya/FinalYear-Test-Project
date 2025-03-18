$(document).ready(function () {

    function list_All_AttemptedStudents(resultId) {
        $.post("include/operation.php?ch=30", {
            data: { id: resultId },
        },
            function (response) {
                console.log(response)
                $("#Attempted-table").html(response);
            }
        )
    }
    var resultId = $('#result_id').val();
    list_All_AttemptedStudents(resultId);

});