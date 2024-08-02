function que_edit(que_id) {
  var test_id = document.getElementById('test_opt').value;
  $('#container').animate({ scrollTop: 0 }, "medium");
  jQuery('#container').load('que.php', { edit_id: que_id, test_id: test_id });
}
function que_delete(que_id) {
  var test_id = document.getElementById('test_opt').value;
  if (confirm('Are you sure want to delete record?')) {
    jQuery('#container').load('que.php', { del_id: que_id, test_id: test_id });
    // console.log('done');
  }
}

// $('#edit-que-container').show();
$(".edit-que").click(function () {
  $("#edit-que-container").show();
});
// ----------close pop-up------------ //
$(".close").click(function () {
  $("#edit_que_form")[0].reset();
  $('#edit-que-container').hide();
});

function que_update() {
  //get data from question_form
  const update_que = 1;
  var que_id = document.forms['question_form']['que_id'].value;
  var question = document.forms['question_form']['question'].value;
  var option_a = document.forms['question_form']['option_a'].value;
  var option_b = document.forms['question_form']['option_b'].value;
  var option_c = document.forms['question_form']['option_c'].value;
  var option_d = document.forms['question_form']['option_d'].value;
  var right_answer = document.forms['question_form']['right_answer'].value;
  var flag = check_que(question, option_a, option_b, option_c, option_d, right_answer);
  if (flag == 0) {
    jQuery('#container').load('que.php', { update_que: update_que, que_id: que_id, question: question, option_a: option_a, option_b: option_b, option_c: option_c, option_d: option_d, right_answer: right_answer });
  }
  else {
    alert('field cant be null');
  }

}
//---------- Insert Question ---------//
$("#create_question_form").submit(function (e) {
  e.preventDefault();
  let test_id = $("#create_question_form .test_id").val();
  let question = $("#create_question_form .question").val();
  let option_a = $("#create_question_form .option_a").val();
  let option_b = $("#create_question_form .option_b").val();
  let option_c = $("#create_question_form .option_c").val();
  let option_d = $("#create_question_form .option_d").val();
  let answer = $("#create_question_form .answer").val();
  if (
    test_id == "" ||
    question == "" ||
    option_a == "" ||
    option_b == "" ||
    option_c == "" ||
    option_d == "" ||
    answer == ""
  ) {
    $(".que").html("* Fill all field");
  } else {
    let data = $("#create_question_form").serialize();
    console.log(data);
    $.ajax({
      type: "POST",
      url: "include/operation.php?ch=11",
      data: data,
      encode: true,
      success: function (response) {
        console.log(response);
        let dataArr = response.split("||");
        if (dataArr[0] == 1) {
          $("#create_question_form")[0].reset();
          alert_show(dataArr[0], dataArr[2]);
          setTimeout(function () {
            $("#alert-test-container").fadeOut();
          }, 900);
          setTimeout(function () {
            $("#container").load("que.php?id=" + dataArr[1]);
          }, 1400);
        } else {
          alert_show(dataArr[0], dataArr[1]);
        }
      },
    });
  }
});
//-----------Display Edit Test---------//
$("#que-table").on("click", ".edit-que", function () {
  let data = this.id;
  let test_id = $("#edit_que_form .test_id").val();
  $.post("include/operation.php?ch=13",
    {
      ch: "13",
      id: data,
      test_id: test_id
    },
    function (response) {
      let data = JSON.parse(response);
      $("#edit_que_form .que_id").val(data['que_id']);
      $("#edit_que_form .question").val(data['question']);
      $("#edit_que_form .option_a").val(data['option_1']);
      $("#edit_que_form .option_b").val(data['option_2']);
      $("#edit_que_form .option_c").val(data['option_3']);
      $("#edit_que_form .option_d").val(data['option_4']);
      var answer= $("<option>");
      answer.val(data['answer']);
      answer.text(data['answer']);
      $("#edit_que_form .answer").append(answer);
      $("#edit_que_form .answer option:contains("+data['answer']+")").prop('selected',true);
    });
});
//------------- Delete Question------------------//
$("#que-table").on("click", ".delete-que", function () {
  if (confirm("Are you sure you want to Delete Question?")) {
    let data = this.id;
    $.post("include/operation.php?ch=12",
      {
        ch: "12",
        id: data
      },
      function (response) {
        // console.log(response);
        let dataArr = response.split("||");
        // console.log(dataArr);
        if (dataArr[0] == 1) {
          setTimeout(function () {
            alert_show(dataArr[0], dataArr[1]);
          }, 1500);
          // alert("Test deleted Successfully");
        }
        else {
          alert_show(dataArr[0], dataArr[1]);
        }
      });
  }
});



//------- dynamic option select-----------//
$("#create_question_form .answer").click(function () {
  // $("#create_question_form .answer").val("");
  if ($("#create_question_form .answer option").length >= 2) {
    $("#create_question_form .answer option").remove();
  }
  let a = $("#create_question_form .option_a").val();
  let b = $("#create_question_form .option_b").val();
  let c = $("#create_question_form .option_c").val();
  let d = $("#create_question_form .option_d").val();
  if (a != "") {
    var option_a = $("<option>");
    option_a.val(a);
    option_a.text(a);
    $("#create_question_form .answer").append(option_a);
  }
  if (b != "") {
    var option_b = $("<option>");
    option_b.val(b);
    option_b.text(b);
    $("#create_question_form .answer").append(option_b);

  }
  if (c != "") {
    var option_c = $("<option>");
    option_c.val(c);
    option_c.text(c);
    $("#create_question_form .answer").append(option_c);
  }
  if (d != "") {
    var option_d = $("<option>");
    option_d.val(d);
    option_d.text(d);
    $("#create_question_form .answer").append(option_d);
  }

});