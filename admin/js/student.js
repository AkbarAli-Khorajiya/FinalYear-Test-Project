$(document).ready(async function () {
    $('.AddStudentModal').hide()
    $('.StudentInfoModel').hide()


    $('#add-student').on('click', () => {
        $('.AddStudentModal').show()
    })
    $('.close').on('click', () => {
        $('.StudentInfoModel').hide()
        $('.AddStudentModal').hide()
        $("#test-list-container").show();
        $("#test-detail-container").hide();
    })
    // hide msg p tag
    $(".msg p").hide();

    function listUser() {
        $.post("include/operation.php?ch=21", {
            ch: "21",
        },
            function (response) {
                $("#user-table").html(response);
                $("table .status").each(function () {
                    ;
                    $(this).text() == "De-Active" ? $(this).css("color", "red") : $(this).css("color", "green");
                });
            }
        )
    }
    listUser();

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
                    $('.AddStudentModal').hide()
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
    $("#search").keyup(function () {
        let data = $("#search").val();
        $.post(
            "include/operation.php?ch=21", {
            data: data,
        },
            function (response) {
                $("#user-table").html(response);
                $("table .status").each(function () {
                    ;
                    $(this).text() == "De-Active" ? $(this).css("color", "red") : $(this).css("color", "green");
                });
            }
        );
    });



    await $("#user-table").on("click", ".stdInfo", async function () {
        $('.StudentInfoModel').show()
        let id = $(this).attr("id");
        console.log($(this).attr("name"))
        $('#student-name').text($(this).attr("name"))
        await $.ajax({
            type: "POST",
            url: "include/operation.php?ch=31",
            data: { id: id },
            encode: true,
            success: function (response) {
                $("#test-list").html(response);
            }
        })
    });
    //get test summary data
    let submitId;
    $("#test-list").on("click", ".test-card", async function () {
        const id = this.id
        submitId = id;
        $("#test-list-container").hide();
        $("#test-detail-container").show();
        await $.ajax({
            type: 'POST',
            url: "include/operation.php?ch=32",
            data: { id: id },
            encode: true,
            success: function (response) {
                const dataArr = response.split('|')
                const totalQuest = dataArr[0];
                const totalCorrectQuest = dataArr[1];
                const totalInCorrectQuest = dataArr[2];
                const testName = dataArr[3];
                const testDate = dataArr[4];
                const percentage = dataArr[5];
                $(".totalQues").text("out of " + totalQuest)
                $(".totalCorrect").text(totalCorrectQuest)
                $(".totalInCorrect").text(totalInCorrectQuest)
                $(".test-name").text(testName)
                $(".test-date").text(testDate)
                $(".test-percentage").text(percentage + '%')
                $(".progress-bar").attr('style', 'width:' + percentage + '%');
                fetchFeedback(submitId)
            }
        })
    })
    //fetch feedback 
    function fetchFeedback(id) {
        $.ajax({
            type: 'POST',
            url: "include/operation.php?ch=34",
            data: { id: id },
            encode: true,
            success: (response) => {
                console.log(response)
                $("#feedback-list").html(response);
            }
        })
    }
    //feedback store
    $('#feedback-form').submit((e) => {
        e.preventDefault();
        let data = $("#feedback-desc").val();
        $.ajax({
            type: 'POST',
            url: "include/operation.php?ch=33",
            data: {
                id: submitId,
                msg: data
            },
            encode: true,
            success: (response) => {
                console.log(response)
                if (response == 1) {
                    fetchFeedback(submitId)
                    let data = $("#feedback-desc").val('');
                    console.log("Succesfully feedback sent..!!")
                } else {
                    console.log("Something went wrong..!!")
                }
            }
        })
    })
    // ---------------
    $("#back-to-tests").on("click", function () {
        console.log("sdasdasdasda dasdasdasdasda")
        $("#test-list-container").show();
        $("#test-detail-container").hide();
    })
    //switch tab
    $('.tabs-trigger').on('click', function () {
        var tabId = $(this).data('tab');

        // Update active tab
        $('.tabs-trigger').removeClass('active');
        $(this).addClass('active');

        // Show active content
        $('.tabs-content').removeClass('active');
        $('#tab-' + tabId).addClass('active');
    });

});

function listUser() {
    $.post("include/operation.php?ch=21", {
        ch: "21",
    },
        function (response) {
            $("#user-table").html(response);
            $("table .status").each(function () {
                ;
                $(this).text() == "De-Active" ? $(this).css("color", "red") : $(this).css("color", "green");
            });
        }
    )
}
listUser();
function updateStatus(element) {

    let id = element.id;
    console.log(id)
    if (element.className == "activate") {
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=22",
            data: { id: id, status: 1 },
            encode: true,
            success: function (response) {
                console.log(response)
                if (response == 1) {
                    listUser()
                }
            }
        });
    } else if (element.className == "de-activate") {
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=22",
            data: { id: id, status: 0 },
            encode: true,
            success: function (response) {
                console.log(response)
                if (response == 1) {
                    listUser()
                }
            }
        });
    }
}