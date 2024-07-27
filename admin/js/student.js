function stud_del(reg_id)
{
    if(confirm('Are you sure want to delete record?'))
    {
        jQuery('#container').load('student.php',{reg_id:reg_id});
        // console.log('done');
    }
}