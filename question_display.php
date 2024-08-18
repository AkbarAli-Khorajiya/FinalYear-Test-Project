<?php
session_start();
$link = mysqli_connect('localhost','root','','exam_test');
    $html = "";
    $id = $_POST['id'];
    $que_no = $_POST['que_no'];
    $query = 'select *from question where id ='.$id;
    $result = mysqli_query($link,$query) or die('Query not Executed');
    while($row = mysqli_fetch_assoc($result))
    {
        $que_id = $row['id'];
        $question = $row['question'];
        $option_query = 'select *from options where que_id ='.$que_id;
        $option_result = mysqli_query($link,$option_query) or die('Query not Executed');
        $i = 0;
        while($option = mysqli_fetch_assoc($option_result))
        {
            $opt[$i] = $option['options'];
            $i++;
        }

    }
    mysqli_close($link);
 $html .='<div class="que_container">
 <div class="que-dis">
     <span lang="en">'.$que_no.'.'.$question.'</span>
 </div>
 <div class="option-dis">
     <span class="option">
         <input type="radio" id="option_a" name="option" onclick="valid(this)" value="'.$opt[0].'"> 
         <label for="option_a"> A. '.$opt[0].'</label>
     </span> 
     <span class="option">
         <input type="radio" id="option_b" name="option" onclick="valid(this)" value="'.$opt[1].'">
         <label for="option_b">B. '.$opt[1].'</label>
     </span>
     <span class="option"> 
         <input type="radio" id="option_c" name="option" onclick="valid(this)" value="'.$opt[2].'">
         <label for="option_c">C. '.$opt[2].'</label>
     </span> 
     <span class="option"> 
         <input type="radio" id="option_d" name="option" onclick="valid(this)" value="'.$opt[3].'">
         <label for="option_d">D. '.$opt[3].'</label>
     </span>
 </div>
 <div class="button">
  <span>';
    if(!isset($_POST['first']))
    {
        $html .=  '<input type="button" id="back" value="Back" onclick="go(this)">';
    }
    if(!isset($_POST['last']))
    {
        $html.= '<input type="button" id="next" value="Next" onclick="go(this)">';
    }

 $html.=' </span>
  <span><input type="submit" value="Submit" name="submit" onclick="redirect(this.value)"></span>
 </div>
</div>
<script>option_check();</script>';
    echo $html;
?>    