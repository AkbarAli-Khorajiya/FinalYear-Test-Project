$(document).ready(function () {
    //---- Show user navbar -------//
    $(".user-btn").on("click",()=>{ 
        console.log('btn-clicked');
        $(".profile-menu").show();
    });
    //----- Hide user navbar --------//
    $(".profile-menu").hide();
    //----- Hide user navbar when click on document -------//
    $(document).click(()=> {
        let btnUserClicked = $.contains($('.user-btn')[0], event.target);
        let profileMenuClicked = $.contains($('.profile-menu')[0], event.target);
        console.log(profileMenuClicked , btnUserClicked);
        if(!profileMenuClicked && !btnUserClicked)
        {
            $(".profile-menu").hide();
        }
    });
    $(".logout").on("click", function () {
        $.ajax({
            type: "POST",
            url: "include/FrontEndOperation.php?ch=3",
            data: {logout : 1},
            success: function (response) {
               if(response == 1)
               {
                    location.href ='index.php';
               }
            }
          });
    });
});
