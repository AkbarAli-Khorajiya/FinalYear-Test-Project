function test_edit(test_id) {
  $("#container").animate({ scrollTop: 0 }, "medium");
  jQuery("#container").load("test.php?", { edit_id: test_id });
}
function test_delete(test_id) {
  if (confirm("Are you sure want to delete record?")) {
    jQuery("#container").load("test.php", { del_id: test_id });
    // console.log('done');
  }
}
function test_update() {
  //get data from question_form
  const update_test = 1;
  var test_id = document.forms["test_form"]["test_id"].value;
  var test_name = document.forms["test_form"]["test_name"].value;
  var test_date = document.forms["test_form"]["test_date"].value;
  var test_start_time = document.forms["test_form"]["test_start_time"].value;
  var test_time = document.forms["test_form"]["test_time"].value;
  var test_marks = document.forms["test_form"]["test_marks"].value;
  var test_question = document.forms["test_form"]["test_question"].value;
  var flag = check_test(
    test_name,
    test_date,
    test_start_time,
    test_time,
    test_marks,
    test_question
  );
  if (flag == 0) {
    jQuery("#container").load("test.php", {
      update_test: update_test,
      test_id: test_id,
      test_name: test_name,
      test_date: test_date,
      test_start_time: test_start_time,
      test_time: test_time,
      test_marks: test_marks,
      test_question,
    });
  } else {
    alert("field cant be null");
  }
}

$("#edit-test-container").hide();

// ----------close pop-up------------ //
$(".close").click(function () {
  $("#edit-test-container").hide();
});

// ---------Displaying created test------------- //
function list_all_test() {
  $.ajax({
    type: "GET",
    url: "include/operation.php?ch=1",
    encode: true,
    success: function (response) {
      $("#test-table").html(response);
    },
  });
}

$("#test-table").on("click", ".testlink", function () {
  $("#container").load("que.php?id=" + this.id);
});

// ------------edit test------------//

$("#test-table").on("click", ".edit-test", function () {
    $("#edit-test-container").show();
  });


  
//-------------Delete Test------------//
$("#test-table").on("click", ".delete-test", function () {
    if(confirm("Are you sure you want to Delete Test?"))
    {
      let data = this.id;
      $.post("include/operation.php?ch=3",
          {
              ch: "3",
              id: data
          },
          function (response) {
              // console.log(response);
              let dataArr = response.split("||");
              // console.log(dataArr);
              if (dataArr[0] == 1) {
                alert_show(dataArr[0],dataArr[1]);
                setTimeout(function(){
                  list_all_test();
                },1000);
                  // alert("Test deleted Successfully");
              }
              else {
                alert_show(dataArr[0],dataArr[1]);
              }
          });
    }
  });

list_all_test(); // get all tests for first load

// ----------Create test------------ //
$("#test_form").submit(function (e) {
  e.preventDefault();
  let testName = $("#test_form .test_name").val();
  let testdate = $("#test_form .test_date").val();
  let testStartTime = $("#test_form .test_start_time").val();
  let testMinTime = $("#test_form .test_time").val();
  let testMarks = $("#test_form .test_marks").val();
  let testTotalQues = $("#test_form .test_question").val();
  if (
    testName == "" ||
    testdate == "" ||
    testStartTime == "" ||
    testMinTime == "" ||
    testMarks == "" ||
    testTotalQues == ""
  ) {
    $(".test").html("* Fill all field");
  } else {
    let data = $("#test_form").serialize();
    $.ajax({
      type: "POST",
      url: "include/operation.php?ch=2",
      data: data,
      encode: true,
      success: function (response) {
        console.log(response);
        let dataArr = response.split("||");
        if (dataArr[0] == 1) {
          $("#test_form")[0].reset();
          alert_show(dataArr[0] , dataArr[2]);
          setTimeout(function(){
            $("#alert-test-container").fadeOut();
          },900);
          setTimeout(function(){
            $("#container").load("que.php?id=" + dataArr[1]);
          },1400);
        } else {
          alert_show(dataArr[0] , dataArr[1]);
        }
      },
    });
  }
});
//-----------Display Edit Test---------//
$("#test-table").on("click", ".edit-test", function (){
      let data = this.id;
      $.post("include/operation.php?ch=4",
          {
              ch: "4",
              id: data
          },
          function (response) {
              let data = JSON.parse(response);
              $("#edit_test_form .test_id").val(data['id']);
              $("#edit_test_form .test_name").val(data['test_name']);
              $("#edit_test_form .test_date").val(data['test_date']);
              $("#edit_test_form .test_start_time").val(data['test_start_time']);
              $("#edit_test_form .test_time").val(data['test_time']);
              $("#edit_test_form .test_marks").val(data['test_marks']);
              $("#edit_test_form .test_question").val(data['test_question']);
          });
});
//-----------Update Test------------//
$("#edit_test_form").submit(function (e) {
  e.preventDefault();
  let testid = $("#edit_test_form .test_id").val();
  let testName = $("#edit_test_form .test_name").val();
  let testdate = $("#edit_test_form .test_date").val();
  let testStartTime = $("#edit_test_form .test_start_time").val();
  let testMinTime = $("#edit_test_form .test_time").val();
  let testMarks = $("#edit_test_form .test_marks").val();
  let testTotalQues = $("#edit_test_form .test_question").val();
  if (
    testid == "" ||
    testName == "" ||
    testdate == "" ||
    testStartTime == "" ||
    testMinTime == "" ||
    testMarks == "" ||
    testTotalQues == ""
  ) {
    $(".edit_test").html("* Fill all field");
  } else {
    let data = $("#edit_test_form").serialize();
    $.ajax({
      type: "POST",
      url: "include/operation.php?ch=5",
      data: data,
      encode: true,
      success: function (response) {
        console.log(response);
        let dataArr = response.split("||");
        if (dataArr[0] == 1) {
          $("#edit_test_form")[0].reset();
          $("#edit-test-container").fadeOut();
          alert_show(dataArr[0] , dataArr[1]);
          list_all_test();
          setTimeout(function(){
            $("#alert-test-container").fadeOut();
          }, 3000);
        } else 
        {
          alert_show(dataArr[0] , dataArr[1]);
        }
      },
    });
  }
});
//-----------Show Alert------------//
function alert_show(value , msg)
{ 
    switch(value)
    {
      case '1':
          $(".alert h3").text(msg);
          $("#alert-test-container div").addClass("success-alert");
          $("#alert-test-container").show().css('display','flex');
          break;
      case '0':
        $(".alert h3").text(msg);
        $("#alert-test-container div").addClass("danger-alert");
        $("#alert-test-container").show().css('display','flex');
          break;

    }
}