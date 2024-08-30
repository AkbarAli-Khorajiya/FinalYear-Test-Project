$(document).ready(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('.date').attr('min', maxDate);
});
// ---------Displaying created test------------- //
function list_all_test() {
    $.ajax({
        type: "GET",
        url: "include/operation.php?ch=1",
        encode: true,
        success: function(response) {
            $("#test-table").html(response);
            //----- Update test show---//
            $(".edit-test").on("click", () => {
                $(".edit-modal-container").show();
            });
        },
    });
}
//--- link for redirect to question----//
$("#test-table").on("click", ".testlink", function() {
    $("#container").load("que.php?id=" + this.id);
});

//-------------Delete Test------------//
$("#test-table").on("click", ".delete-test", function() {
    if (confirm("Are you sure you want to Delete Test?")) {
        let data = this.id;
        $.post(
            "include/operation.php?ch=3", {
                ch: "3",
                id: data,
            },
            function(response) {
                console.log(response);
                let dataArr = response.split("||");
                // console.log(dataArr);
                if (dataArr[0] == 1) {
                    alert_show(dataArr[0], dataArr[1]);
                    setTimeout(function() {
                        list_all_test();
                        $("#alert-container").fadeOut();
                    }, 1000);
                    // alert("Test deleted Successfully");
                } else {
                    alert_show(dataArr[0], dataArr[1]);
                }
            }
        );
    }
});

list_all_test(); // get all tests for first load

//--------Edit Test Modal -----------//
$(".edit-modal-container").hide();
$(".close").on("click", () => {
    $(".edit-modal-container").hide();
});
//-------- Test Modal -------------//
$(".modal-container").hide();
$("#add-btn").on("click", () => {
    $(".modal-container").show();
});
$(".close").on("click", () => {
    $(".modal-container").hide();
});
// ----------Create test------------ //
$("#test-submit-form").submit(function(e) {
    e.preventDefault();
    let testName = $("#test-submit-form #test-name").val();
    let testDuration = $("#test-submit-form #duration").val();
    let testStartDate = $("#test-submit-form #date").val();
    let testStartTime = $("#test-submit-form #time").val();
    let testMarks = $("#test-submit-form #marks").val();
    let createdFor = $("#test-submit-form #created-for").val();
    if (
        testName == "" ||
        testDuration == "" ||
        testStartDate == "" ||
        testStartTime == "" ||
        testMarks == "" ||
        createdFor == ""
    ) {
        $(".msg").html("<p class='error'>*Fill all field</p>");
    } else {
        let data = $("#test-submit-form").serialize();
        console.log(data)
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=2",
            data: data,
            encode: true,
            success: function(response) {
                console.log(response);
                let dataArr = response.split("||");
                if (dataArr[0] == 1) {
                    $(".modal-container").hide();

                    alert_show(dataArr[0], dataArr[2]);
                    setTimeout(function() {
                        $("#alert-container").fadeOut();
                    }, 900);
                    $("#container").load("que.php?id=" + dataArr[1]);
                } else {
                    alert_show(dataArr[0], dataArr[1]);
                }
            },
        });
    }
});
// --- hide update msg --------//
$("#test-update-form .msg p").hide();
//-----------Display Edit Test---------//
$("#test-table").on("click", ".edit-test", function() {
    let data = this.id;
    $.post(
        "include/operation.php?ch=4", {
            ch: "4",
            id: data,
        },
        function(response) {
            let data = JSON.parse(response);
            $("#test-update-form input[name='test-id']").val(data["id"]);
            $("#test-update-form input[name='test-name']").val(data["test_name"]);
            $("#test-update-form input[name='duration']").val(data["duration"]);
            $("#test-update-form input[name='marks']").val(data["marks_per_ques"]);
            $("#test-update-form input[name='date']").val(data["test_start_date"]);
            $("#test-update-form input[name='time']").val(data["test_start_time"]);
            let created_for = data['created_for'];
            $("#created-for option[value='"+created_for+"']").prop("selected", true);
        }
    );
});
//-----------Update Test------------//
$("#test-update-form").submit(function(e) {
    e.preventDefault();
    let testId = $("#test-update-form input[name='test-id']").val();
    let testName = $("#test-update-form input[name='test-name']").val();
    let testDuration = $("#test-update-form input[name='duration']").val();
    let testMarks = $("#test-update-form input[name='marks']").val();
    let testDate = $("#test-update-form input[name='date']").val();
    let testTime =  $("#test-update-form input[name='time']").val();
    let createdFor =  $("#test-update-form #created-for").val();
    if (
        testId == "" ||
        testName == "" ||
        testDuration == "" ||
        testMarks == "" ||
        testDate == "" ||
        testTime== "" ||
        createdFor == ""
    ) {
        $("#test-update-form .msg .error").text('* Fill all field');
        $("#test-update-form .msg .error").show();
    } else {
        let data = $("#test-update-form").serialize();
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=5",
            data: data,
            encode: true,
            success: function(response) {
                console.log(response);
                let dataArr = response.split("||");
                if (dataArr[0] == 1) {
                    $("#test-update-form")[0].reset();
                    $("#test-update-form .msg .success").text(dataArr[1]);
                    $("#test-update-form .msg .success").show();
                    list_all_test();
                    setTimeout(function() {
                        $(".edit-modal-container").fadeOut();
                        $("#test-update-form .msg .success").hide();
                    }, 2000);
                } else {
                    $("#test-update-form .msg .error").text(dataArr[1]);
                    $("#test-update-form .msg .error").show();
                    setTimeout(() => {
                        $("#test-update-form .msg .error").hide();
                    }, 2000);
                }
            },
        });
    }
});
//-----------Search Test in js------------//
$("#search").keyup(function() {
    let data = $("#search").val();
    $.post(
        "include/operation.php?ch=6", {
            data: data,
        },
        function(response) {
            $("#test-table").html(response);
        }
    );
});


//-------- clear search -------------//
$(".search .reset").on("click", function() {
    $(".search .search_input").val("");
    list_all_test();
});