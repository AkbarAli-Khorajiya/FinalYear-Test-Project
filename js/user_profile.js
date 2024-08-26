//------show profile menu-------//
$("nav .img").click(()=>{
    $("nav .user-menu").css('display', 'flex');
});
// ------hide profile menu-------//
let img = document.querySelector(".img");
let menu = document.querySelector(".user-menu");
img.addEventListener("click",()=>{
    menu.style.display = 'flex';
});
document.addEventListener("click",()=>{
    let imgClicked = img.contains(event.target);
    let menuClicked = menu.contains(event.target);
    if(!imgClicked && !menuClicked)
    {
        menu.style.display = "none";
    }
});
//--------- Test detail show---------//
$(".test-detail").click(()=>{
    $(".popup").css('display', 'flex');
})
// --------Test detail hide---------//
$(".popup").click(()=>{
    $(".popup").hide();
});