
// ---------Displaying all question------------- //
function list_all_ques(test_id) {
    $.post("include/operation.php?ch=14", {
            ch: "14",
            data: { testId: test_id },
        },
        function(response) {
            $("#que-table").html(response);
            //edit-modal-container show
            $(".edit-que").click(()=>{
                $(".edit-modal-container").show();
            });
        }
    )
}
var testId = $('#test_id').val();
list_all_ques(testId);
//-------- Question Modal -------------//
$(".modal-container").hide();
$("#add-btn").on("click", () => {
    $(".modal-container").show();
});
$(".close").on("click", () => {
    $(".modal-container").hide();
});
// --------- Hide msg --------------//
$(".msg p").hide();
//---------- Insert Question ---------//
$("#que-submit-form").submit(function(e) {
    e.preventDefault();
    let test_id = $("#que-submit-form .test_id").val();
    let question = $("#que-submit-form .question").val();
    let option_a = $("#que-submit-form .option_a").val();
    let option_b = $("#que-submit-form .option_b").val();
    let option_c = $("#que-submit-form .option_c").val();
    let option_d = $("#que-submit-form .option_d").val();
    let answer = $("#que-submit-form .answer").val();
    if (
        test_id == "" ||
        question == "" ||
        option_a == "" ||
        option_b == "" ||
        option_c == "" ||
        option_d == "" ||
        answer == ""
    ) {
        $(".msg").html("<p class='success'>Fill all fields</p>");
    } else {
        let data = $("#que-submit-form").serialize();
        console.log(data);
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=11",
            data: data,
            encode: true,
            success: function(response) {
                console.log(response);
                let dataArr = response.split("||");
                if (dataArr[0] == 1) {
                    $("#que-submit-form")[0].reset();
                    $("#que-submit-form .msg .success").text(dataArr[2]);
                    $("#que-submit-form .msg .success").show();
                    list_all_ques(testId);
                    setTimeout(function() {
                        $(".modal-container").fadeOut();
                        $("#que-submit-form .msg .success").hide();
                    }, 2000);
                } else {
                    $("#que-submit-form .msg .error").text(dataArr[1]);
                    $("#que-submit-form .msg .error").show();
                    setTimeout(() => {
                        $("#que-submit-form .msg .error").hide();
                    }, 2000);
                }
            },
        });
    }
});
//-------- Edit Question Modal -------------//
$(".edit-modal-container").hide();
$(".close").on("click", () => {
    $(".edit-modal-container").hide();
});
//-----------Display Edit Que---------//
$("#que-table").on("click", ".edit-que", function() {
    let data = this.id;
    let test_id = $("#que-update-form .test_id").val();
    $.post("include/operation.php?ch=13", {
            ch: "13",
            id: data,
            test_id: test_id
        },
        function(response) {
            let data = JSON.parse(response);
            $("#que-update-form .que_id").val(data['que_id']);
            $("#que-update-form .question").val(data['question']);
            $("#que-update-form .option_a").val(data['option_1']);
            $("#que-update-form .option_b").val(data['option_2']);
            $("#que-update-form .option_c").val(data['option_3']);
            $("#que-update-form .option_d").val(data['option_4']);
            appendEditQueOption();
            $("#que-update-form .answer option[value='"+data['answer']+"']").prop("selected", true);
        });
});
//------------- Delete Question------------------//
$("#que-table").on("click", ".delete-que", function() {
    if (confirm("Are you sure you want to Delete Question?")) {
        let data = this.id;
        $.post("include/operation.php?ch=12", {
                ch: "12",
                id: data
            },
            function(response) {
                // console.log(response);
                let dataArr = response.split("||");
                // console.log(dataArr);
                if (dataArr[0] == 1) {
                    alert("Question Deleted");
                    list_all_ques(testId);
                } else {
                    alert("Question Not Deleted");
                }
            });
    }
});

//------- dynamic option select-----------//

$("#que-submit-form input").on('input',() => {
    $("#que-submit-form .answer option").remove();

    $("#que-submit-form .answer").append('<option value="">----Select Answer----</option>');


    console.log($("#option_a").val());
    let a = $("#que-submit-form input[name='option_a']").val();
    let b = $("#que-submit-form input[name='option_b']").val();
    let c = $("#que-submit-form input[name='option_c']").val();
    let d = $("#que-submit-form input[name='option_d']").val();

    if (a != "") {
        var option_a = $("<option>");
        option_a.val(a);
        option_a.text(a);
        $("#que-submit-form .answer").append(option_a);
    }
    if (b != "") {
        var option_b = $("<option>");
        option_b.val(b);
        option_b.text(b);
        $("#que-submit-form .answer").append(option_b);
    }
    if (c != "") {
        var option_c = $("<option>");
        option_c.val(c);
        option_c.text(c);
        $("#que-submit-form .answer").append(option_c);
    }
    if (d != "") {
        var option_d = $("<option>");
        option_d.val(d);
        option_d.text(d);
        $("#que-submit-form .answer").append(option_d);
    }
})
$('#que-submit-form .answer').on('change', function() {
    let selectedValue = $(this).val();
})

//-----------Search Question in js------------//
$("#search").keyup(function() {
    let searchQue = $("#search").val();
    let tId = $('#test_id').val();
    let data = { search: searchQue, testId: tId };
    console.log(data);
    $.post("include/operation.php?ch=15", {
            data: data
        },
        function(response) {
            $("#que-table").html(response);
        });
});

//-------- clear search -------------//
$(".search .reset").on("click", function() {
    $(".search .search_input").val('');
    list_all_ques();
});

// ----------dynamic option select for edit que ---------------//
$("#que-update-form input").on('input',()=>{
    appendEditQueOption();
});
function appendEditQueOption()
{
    $("#que-update-form .answer option").remove();

    $("#que-update-form .answer").append('<option value="">----Select Answer----</option>');


    console.log($("#que-update-form #option_a").val());
    let a = $("#que-update-form input[name='option_a']").val();
    let b = $("#que-update-form input[name='option_b']").val();
    let c = $("#que-update-form input[name='option_c']").val();
    let d = $("#que-update-form input[name='option_d']").val();

    if (a != "") {
        var option_a = $("<option>");
        option_a.val(a);
        option_a.text(a);
        $("#que-update-form .answer").append(option_a);
    }
    if (b != "") {
        var option_b = $("<option>");
        option_b.val(b);
        option_b.text(b);
        $("#que-update-form .answer").append(option_b);
    }
    if (c != "") {
        var option_c = $("<option>");
        option_c.val(c);
        option_c.text(c);
        $("#que-update-form .answer").append(option_c);
    }
    if (d != "") {
        var option_d = $("<option>");
        option_d.val(d);
        option_d.text(d);
        $("#que-update-form .answer").append(option_d);
    }
}
//-----------Update que------------//
$("#que-update-form").submit(function(e) {
    e.preventDefault();
    let testid = $("#que-update-form input[name='test_id']").val();
    let queid = $("#que-update-form input[name='que_id']").val();
    let question = $("#que-update-form input[name='question']").val();
    let option_a = $("#que-update-form input[name='option_a']").val();
    let option_b = $("#que-update-form input[name='option_b']").val();
    let option_c = $("#que-update-form input[name='option_c']").val();
    let option_d = $("#que-update-form input[name='option_d']").val();
    let answer = $("#que-update-form .answer").val();
    if (
        testid == "" ||
        queid == "" ||
        question == "" ||
        option_a == "" ||
        option_b == "" ||
        option_c == "" ||
        option_d == "" ||
        answer == ""
    ) {
        $(".edit_que_title").html("* Fill all field");
    } else {
        let data = $("#que-update-form").serialize();
        console.log(data);
        $.ajax({
            type: "POST",
            url: "include/operation.php?ch=16",
            data: data,
            encode: true,
            success: function(response) {
                console.log(response);
                let dataArr = response.split("||");
                if (dataArr[0] == 1) {
                    $("#que-update-form")[0].reset();
                    $("#que-update-form .msg .success").text(dataArr[1]);
                    $("#que-update-form .msg .success").show();
                    list_all_ques(testId);
                    setTimeout(function() {
                        $(".edit-modal-container").fadeOut();
                        $("#que-update-form .msg .success").hide();
                    }, 2000);
                } else {
                    $("#que-update-form .msg .error").text(dataArr[1]);
                    $("#que-update-form .msg .error").show();
                    setTimeout(() => {
                        $("#que-update-form .msg .error").hide();
                    }, 2000);
                }
            },
        });
    }
});