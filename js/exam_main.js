function shuffleArray(array) 
{
    for (let i = array.length - 1; i > 0; i--) 
    {
        // Generate a random index from 0 to i (inclusive)
        const randomIndex = Math.floor(Math.random() * (i + 1));
        // Swap the elements at randomIndex and i
        [array[i], array[randomIndex]] = [array[randomIndex], array[i]];
    }
}            
shuffleArray(id_arr);
console.log(id_arr);
//list and anchor tag created dynamically
for(let i=0;i<max;i++)
{
    var j=i+1;
    const list = document.createElement('li');
    const link = document.createElement('a');
    link.id = "a"+id_arr[i];
    link.className = "radio_val";
    link.setAttribute('href','javascript:void(0)');
    link.setAttribute('onclick','link('+id_arr[i]+')');
    link.innerText = j; 
    list.appendChild(link);
    document.getElementById("list").appendChild(list);
    j++;
}
var id=0;  
//set a link for anchor tag
function link(number)
{
    jQuery('#container').load('question_display.php',{id:number});
    valid();
    answer_count();
    id=id_arr.indexOf(number);
}
function valid()
{
    var element = document.getElementsByName("option");
    var indicate = document.getElementById("a"+id_arr[id]);
    var flag = true;
    for(var i=0;i<element.length;i++)
    {
        if(element[i].checked)
        {
            flag = false;
            var option = element[i].value;
            break;
        }
    }
    if(flag == true)
    {
        indicate.style.backgroundColor = '#E60026';
        indicate.style.borderRadius = '20%';
        indicate.style.color = 'white';  
    }
    else
    {
        indicate.style.backgroundColor = '#009E60';
        indicate.style.borderRadius = '50%';
        indicate.style.color = 'white';
        localStorage.setItem(id_arr[id],option);
        jQuery('#get_value').load('answer_store.php',{option:option,id:id_arr[id]});  
        console.log(option);
    }
  
}
function go(element)
{
if(typeof element !== 'undefined')
{
    switch(element.value)
    {
        case "Next":
            {
                answer_count();
                if(id<max-1)
                {
                    id++;
                    console.log("next:"+id);
                    jQuery('#container').load('question_display.php',{id:id_arr[id]});
                }
                else
                {
                    element.disabled = true;
                }
                break;
            }
        case "Back":
            {
                if(id>0)
                {
                    id--;
                    console.log("back"+id);
                    jQuery('#container').load('question_display.php',{id:id_arr[id]});
                }
                else
                {
                    element.disabled = true;
                }
                break;
            }       
    } 
}
else
{
    jQuery('#container').load('question_display.php',{id:id_arr[0]});
}
}
go();

// Set the date and time for the countdown to end
// var countDownDate = new Date();
// countDownDate.setHours(countDownDate.getHours() + 1); // Add 1 hour to the current time
// countDownDate = countDownDate.getTime(); // Convert to milliseconds
const add_time = 30;
const initialDuration = add_time * 60 * 1000; // add minutes to the current time
const countDownDate = initialDuration ;
const startTime = new Date().getTime();
// Update the countdown every 1 second
var x = setInterval(function() {

// Get the current date and time
var now = new Date().getTime();

// Find the difference between the current time and the countdown end time
var difference = countDownDate - (now - startTime);

// Calculate the remaining time in hours, minutes, and seconds
var hours = Math.floor(difference / (1000 * 60 * 60));
var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((difference % (1000 * 60)) / 1000);

// Display the remaining time in an element with id="clock"
document.getElementById("clock").innerHTML = addZero(hours) + ":" + addZero(minutes) + ":" + addZero(seconds);

// If the countdown is over, display a message and stop the interval
if (difference < 0) 
{
    clearInterval(x);
    document.getElementById("clock").innerHTML = "Time's up!";
    setTimeout(function(){
        var body = document.querySelector('body');
        body.style.display = 'none;'
        redirect('time_over');
    },2000);
}
}, 1000);

function addZero(n) {
return (n < 10) ? "0" + n : n;
}

function option_check()
{
    let value = localStorage.getItem(id_arr[id]);
    if(value != null )
    {
        var element = document.getElementsByName("option");
        for(var i=0;i<element.length;i++)
        {
            if(value == element[i].value)
            {
                element[i].checked = true;
                break;
            }
        }
    }
}

var nvisit_answer = document.getElementById("nvisit");
var answer = document.getElementById("ans");
var not_answer = document.getElementById("nans"); 

function answer_count(value)
{
    const link = document.getElementsByClassName("radio_val");
    var nvisit_count = max;
    let ans_count=0;
    let notans_count = 0;
    for(var i = 0 ; i < link.length; i++ )
    {
        if(link[i].style.backgroundColor == 'rgb(0, 158, 96)')
        {
            ans_count++;
            nvisit_count--;
        }
        else if(link[i].style.backgroundColor == 'rgb(230, 0, 38)')
        {
            notans_count++;
            nvisit_count--;
        }
    }
    nvisit_answer.value = nvisit_count; 
    answer.value = ans_count;
    not_answer.value = notans_count;
    if(value!= 'null' && value == 1)
    {
        let arr = {answer : ans_count,not_answer:notans_count,nvisit_answer:nvisit_count,total_que:max};
        return arr;
    }
}  


function redirect(value)
{
    var section1 = document.getElementById("primary_section");
    var section2 = document.getElementById("secondary_section");
    section1.style.display = 'none';
    section2.style.display = 'flex';
    let arr = answer_count(1);
    if(value == 'Submit')
    {
        jQuery('#secondary_section').load('user_submit.php',{answer_track_data:arr,redirect:value});
    }
    else if(value == 'time_over')
    {
        jQuery('#secondary_section').load('user_submit.php',{answer_track_data:arr,redirect:value});
    }
}

//function for clear localstorage every refresh
window.addEventListener('beforeunload', function() {
    localStorage.clear();
  });