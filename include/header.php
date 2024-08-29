<style>
    header
{
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 10vh;
    width: 100vw;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.178);
}
header span
{
    margin-left: 4vh;
    font-family: 'Roboto', sans-serif;
    font-size: 3.5vw;
    font-weight: 700;
}
header span a
{
    color: rgb(38, 50, 56);
    text-decoration: none;
}
header nav
{
    font-size: 1.7vw;
    align-self: center;
    margin-right: 4vh;
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
}
header nav a
{
    color: #455a64;
    margin: 0.8vh;
    text-decoration: none;
}
nav  img
{
    /* height: 1.7vw; */
    width: 30px;
    position: relative;
    top: 7px;
    transition: 200ms linear 0s all;
    border-radius: 100%;
}
nav img:hover
{
    box-shadow: 0px 0px 4px rgba(85, 85, 85, 0.658);
}
nav .user-menu
{
    z-index: 1;
    display: none;
    flex-direction: column;
    flex-wrap: wrap;
    align-items: flex-start;
    font-size: 1.2vw;
    list-style: none;
    position: fixed;
    top: 12%;
    right: 2.5%;
    padding: 10px 20px;
    color: white;
    background-color: rgb(73, 72, 72);
    border-radius: 20px 0px 20px 20px;
    animation: up 0.5s;
}
@keyframes up {
    0%{
        opacity: 0;visibility: hidden;
    }
    100%{
        opacity: 1;visibility: visible;
    }
}
.user-menu span
{
    margin: 0;
    font-size: 1.2vw;
    padding: 5px 10px;
    display: flex;
    gap: 15px;
    /* flex-direction: row; */
    align-items: center;
    width: 100%;
    justify-content: flex-start;
    /* align-items:center; */
    /* border-bottom: 1px solid white; */
}
.user-menu img
{
    all: unset;
    width: 30px;
    margin: 0px;
    padding: 0px;
    /* align-self: center; */
    /* text-align: center; */
}
.user-menu .user-data
{
    margin: 10px 0px;
    padding: 10px 2px;
    display: flex;
    justify-content: center;
    flex-flow: column wrap;
    align-items: flex-start;
    background-color: rgb(58, 58, 58);
    border-radius: 10px;
    /* box-shadow: 0px 0px 8px rgba(158, 158, 158, 0.466); */
}
.user-data span
{
    all: unset;
}
.user-data .user-name
{
    padding: 0px 5px;
}
.user-data .user-email
{
    font-size: 13px;
    align-self: flex-end;
    padding: 0px 10px;
}
.user-menu .logout
{
    /* text-align: right; */
    padding: 5px 0px;
    justify-content: flex-end;
    cursor: pointer;
    transition: 200ms linear 0s all;
    &:hover{
        opacity: 70%;
    }
}
nav .user-menu:after {
    content: '';
    display: block;
    width: 0px;
    left: 95.5%;
    border-top: 8px solid #1C242B;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    position: absolute;
    top: -4.5%;
    margin-left: -5px;
    transform: rotate(180deg);
  }
</style>
<header>
    <span> <a href="index">Exam25</a> </span>
    <nav>
        <a href="index.php">HOME</a>
        <a href="student_login.php">EXAM</a>
        <a href="#">EVENTS</a>
        <a href="exam25_about">ABOUT</a>
        <a href="#">CONTACT</a>
            <!-- user profile menu -->
        <?php 
            if(!isset($_SESSION['stdLogin']) && empty($_SESSION['stdLogin']))
            {
        ?>
            <a href="student_reg">REGISTER</a>
        <?php
            }
            else
            {
        ?>
        <img src="image/userprofile/user.png" class="img" alt="">
        <div class="user-menu">
            <span class="profile"> <img src="image/userprofile/profile.png"> My profile</span>
            <hr width="100%">
            <span class="user-data">
                <span class="user-name"><?php echo $_SESSION['userName'][1]; ?></span>
                <span class="user-email"><?php echo $_SESSION['userMail']; ?></span>
            </span>
            <hr width="100%">
            <span class="logout"> <img src="image/userprofile/logout.png"> Log-out</span>
        </div>
        <?php
            }
        ?>
    </nav>
</header>
<script>
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
// ----------Log Out----------//
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
</script>