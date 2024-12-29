$(document).ready(function () {

    //get parameter from url
    const urlParameter = new URLSearchParams(window.location.search);
    //get testId from url
    const testId = urlParameter.get('testId');
    //ajax for get que from database
    $.ajax({
        type: "post",
        url: "include/FrontEndOperation.php?ch=5",
        data:{testId: testId},
        success: function (response) {
            response = JSON.parse(response);
            localStorage.setItem('allQues', JSON.stringify(response));
        }
    });

    //get question from local storage
    const allQues = JSON.parse(localStorage.getItem('allQues'));
    if(allQues == null)
    {
        location.reload();
        // setTimeout(function(){
        //     location.reload();
        // },100);
    }
    // get all question id
    let queId = Object.keys(allQues);

    // function to shuffle array
    function shuffleArray(array){
        for(let i = array.length - 1; i > 0; i--){
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    // console.log(queId)
    // shuffled question id array
    queId = shuffleArray(queId);
    // console.log(queId);

    //create dynammic btn for navigation of question
    for (let index = 0; index < queId.length; index++) {
        let btn = document.createElement("button");
        btn.innerHTML = index+1;
        btn.setAttribute("id", queId[index]);
        btn.setAttribute("class", "btn");
        document.getElementById("queNavigationBtn").appendChild(btn);
    }
    //btn click event for navigation of question
    $("#queNavigationBtn .btn").on('click', function () {
        i = queId.indexOf(this.id);
        disQue(this.id)
        // indicateOption(this.id);
    });
    //btn click event for next and back
    $("#btnNext").click(function(){
        navigateQue(this);
    });
    $("#btnBack").click(function(){
        navigateQue(this);
    });
    //variable for access question index
    let i = 0;
    // function to navigate question
    function navigateQue(element)
    {
        // console.log("navigateQue")
        if(typeof element != 'undefined')
        {   
            if($(element).val() == "Next")
            {   
                // console.log(i)
                if( i < queId.length)
                {
                    i++;
                    disQue(queId[i]);
                }
                if(i == queId.length-1)
                {
                    $("#btnNext").css("display", "none");
                }
                if(i > 0)
                {
                    $("#btnBack").css("display", "inline-block");
                }
            }
            else if($(element).val() == "Back")
            {
                // console.log(i);
                if(i > 0 && i < queId.length)
                {
                    i--;
                    disQue(queId[i]);
                }
                if(i == 0)
                {
                    $("#btnBack").css("display", "none");
                }
                if(i < queId.length)
                {
                    $("#btnNext").css("display", "inline-block");
                }
            }
        }
        else
        {
            disQue(queId[0]);
            $("#btnBack").css("display", "none");
        }
    }
    navigateQue();
    //function for diplay que
    function disQue(id)
    {   
        // console.log("disQue")
        $("input[name='option']").prop('checked', false);
        let que = allQues[id].question;
        let optA = allQues[id].options[0];
        let optB = allQues[id].options[1];
        let optC = allQues[id].options[2];
        let optD = allQues[id].options[3];
        $(".que-wrapper").html("Question "+(i+1)+" of "+queId.length+"");
        $("#question").html(que);
        $("#option_a_label").html(optA);
        $("#option_b_label").html(optB);
        $("#option_c_label").html(optC);
        $("#option_d_label").html(optD);

        $("#option_a").val(optA);
        $("#option_b").val(optB);
        $("#option_c").val(optC);
        $("#option_d").val(optD);
        tickOption();
    }
    //btn click event for option selection
    $('input[name="option"]').each(function (index, element) {
        $(element).click(function(){
            checkOption(this);
        });        
    });
    // function to check option is checked or not
    function checkOption(element)
    {
        // console.log("checkOption")
        let option = $(element).val();
        localStorage.setItem(queId[i], option);
        indicateOption(queId[i]);
    }
    //function to indicate option is ticked or not
    function indicateOption(id)
    {
        // console.log("indicateOption")
        if(localStorage.getItem(id) != null)
        {
            $("#"+id).css("background-color", "#009E60");
        }
        else
        {
            $("#"+id).css("background-color", "#E60026");
        }
        setTimeout(() => { countAnswer(); } , 200);
        // countAnswer();
    }
    //function to count answer
    function countAnswer(value)
    {
        // console.log("countAnswer")
        let btn = $("#queNavigationBtn").children();
        let nvisit_count = queId.length;
        let ans_count = 0;
        let notans_count = 0;
        btn.each(function (index, element) {
            if($(element).css('background-color') == 'rgb(230, 0, 38)')
            {
                notans_count++;
                nvisit_count--;
            }
            else if($(element).css('background-color') == 'rgb(0, 158, 96)')
            {
                ans_count++;
                nvisit_count--;
            }
        });
        $("#nVisit").html(nvisit_count);
        $("#ans").html(ans_count);
        $("#nAns").html(notans_count);
        if(value == 1){
            let arr = {answer : ans_count, not_answer : notans_count, nvisit_answer : nvisit_count, total_que : queId.length};
            return arr;
        }
    }
    countAnswer();
    //function to tick option
    function tickOption(){
        // console.log("tickOption")
        let option = localStorage.getItem(queId[i]);
        if(option != null)
        {
            $('input[name="option"]').each(function (index, element) {
                if($(element).val() == option)
                {
                    $(element).prop('checked', true);
                }
            });
        }
        indicateOption(queId[i]);
    }
    //function to timer countdown
    function startTimer(duration, display) {
        var timer = duration*60, minutes, seconds,hours;
        var x = setInterval(function () {
            hours = Math.floor(timer/3600);
            minutes = Math.floor((timer % 3600)/60);
            seconds = parseInt(timer % 60, 10);
            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            display.text(hours + " : " + minutes + " : " + seconds);
            if (--timer < 0) {
                clearInterval(x);
                display.text("Time's Up!");
                setTimeout(function(){
                    $("body").css("display", "none");
                    redirect(1);
                },2000);
            }
        },1000);
    }
    startTimer(30, $("#clock"));
    $("#btnSubmit").click(function(){
        $("body").css("display", "none");
        redirect(1);
    });
    //function to redirect to result page
    function redirect(value){
        let answerCountArr = countAnswer(1);
        if(value == 1)
        {
            const userAnswer = {};
            userAnswer['testId'] = testId;
            for (let i = 0; i < localStorage.length; i++) {
                const key = localStorage.key(i);
                if(key == 'allQues')
                {
                    continue;
                }
                const value = localStorage.getItem(key)
                userAnswer[key] = value.trim();
            }
            userAnswer['total_que'] = answerCountArr['total_que'];
            console.log(userAnswer);
            $.ajax({
                type: "POST",
                url: "include/FrontEndOperation.php?ch=4",
                data: userAnswer,
                success: function (response) {
                    localStorage.clear();
                    console.log(response);
                    let data = JSON.parse(response);
                    console.log(data)
                    const res = {...answerCountArr,...data};
                    window.location.href = 'user_submit.php?res_data='+JSON.stringify(res);
                }
            });
        }
    }
});
$(window).on('beforeunload', function () {
    for (const key in localStorage) {
        if (key !== 'allQues') {
          localStorage.removeItem(key);
        }
    }
});
