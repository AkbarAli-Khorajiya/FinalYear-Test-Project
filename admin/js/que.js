function que_edit(que_id)
{
    var test_id = document.getElementById('test_opt').value;
    $('#container').animate({ scrollTop: 0 }, "medium");
    jQuery('#container').load('que.php',{edit_id:que_id,test_id:test_id});
}
function que_delete(que_id)
{
    var test_id = document.getElementById('test_opt').value;
    if(confirm('Are you sure want to delete record?'))
    {
        jQuery('#container').load('que.php',{del_id:que_id,test_id:test_id});
        // console.log('done');
    }
}

// $('#edit-que-container').show();
$('#edit-que-container').hide();
// ----------close pop-up------------ //
$(".close").click(function () {
    $('#edit-que-container').hide();
});

function que_update()
{
    //get data from question_form
    const update_que = 1;
    var que_id = document.forms['question_form']['que_id'].value;
    var question = document.forms['question_form']['question'].value;
    var option_a = document.forms['question_form']['option_a'].value;
    var option_b = document.forms['question_form']['option_b'].value;
    var option_c = document.forms['question_form']['option_c'].value;
    var option_d = document.forms['question_form']['option_d'].value;
    var right_answer = document.forms['question_form']['right_answer'].value;
    var flag = check_que(question,option_a,option_b,option_c,option_d,right_answer);
    if(flag==0)
    {
        jQuery('#container').load('que.php',{update_que:update_que,que_id:que_id,question:question,option_a:option_a,option_b:option_b,option_c:option_c,option_d:option_d,right_answer:right_answer});
    }
    else
    {
        alert('field cant be null');
    }
    
}
function que_insert()
{
    //get data from question_form
    const insert_que = 1;
    var test_id = document.getElementById('test_opt').value;
    var question = document.forms['question_form']['question'].value;
    var option_a = document.forms['question_form']['option_a'].value;
    var option_b = document.forms['question_form']['option_b'].value;
    var option_c = document.forms['question_form']['option_c'].value;
    var option_d = document.forms['question_form']['option_d'].value;
    var right_answer = document.forms['question_form']['right_answer'].value;
    var flag = check_que(question,option_a,option_b,option_c,option_d,right_answer,test_id);
    if(flag==0)
    {
        jQuery('#container').load('que.php',{insert_que:insert_que,question:question,option_a:option_a,option_b:option_b,option_c:option_c,option_d:option_d,right_answer:right_answer,test_id:test_id});
    }
    else
    {
        alert('field cant be null');
    }    
}

function check_que(question,option_a,option_b,option_c,option_d,right_answer,test_id)
{
    if(question == '' || option_a == '' || option_b == '' || option_c == '' || option_d == '' || right_answer == '' || test_id == '')
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

function dis_que()
{
    let que_dis = 1;
    let test_opt = document.getElementById('test_opt');
    test_id = test_opt.value;
    jQuery('#container').load('que.php',{test_id:test_id,que_dis:que_dis});
}