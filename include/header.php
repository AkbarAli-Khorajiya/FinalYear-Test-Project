<style>
    header
    {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 20px;
    }
    header .logo
    {
        font-size: 46px;
        font-family: 'Ubuntu-Bold' , sans-serif;
        color: var(--secondary-color);
    }
    .logo span
    {
        color: var(--primary-color);
    }
    header nav
    {
        height: fit-content;
        width: fit-content;
        display: flex;
        justify-content: center;
        /* align-items: center; */
        flex-direction: row;
        font-family: 'Roboto-Regular' , sans-serif;
    }
    nav a
    {
        color: var(--nav-color);
        padding: 10px;
        font-size: 28px;
        text-decoration: none;
        transition: 200ms linear 0s all;
        position: relative;
        &:hover{
            color: var(--secondary-color);
        }
    }
    nav .login-btn
    {
        align-self: center;
        font-size: 22px;
        color: #ffff;
        padding: 4px 20px;
        background-color: var(--primary-color);
        border-radius: 50px;
        transition: 200ms ease all 0s;
        &:hover
        {
            background-color:#7376b6;
            text-decoration: none;
            color: #ffff;
        }
    }
    nav .user-btn
    {
        /* display: inline-block; */
        padding:10px 10px 0px 10px;
        img
        {
            height: 35px;
            width: 35px;
            /* position: relative; */
            /* top:8px; */
            background-color: var(--primary-color);
            fill: #ffffff;
            border-radius: 50px;
            /* padding: 3px; */
            transition: 200ms ease all 0s;
            &:hover
            {
                background-color: var(--secondary-color);
                fill: var(--primary-color);
            }
        }
    }
    nav .profile-menu
    {
        position: fixed;
        right: 30px;
        top: 60px;
        background-color: #ffffff;
        width: fit-content;
        font-family: 'Roboto-Regular' , sans-serif;
        border-radius: 15px;
        border: 0.5px solid #1a1a2738;
        z-index: 99;
        padding-bottom: 5px;
        animation: 200ms fade linear;
        cursor: pointer;
        .user-profile
        {
            /* width:fit-content; */
            border-bottom: 0.5px solid #1a1a2738;
            display: flex;
            flex-flow: row;
            padding: 10px;
            margin-bottom: 5px;
        }
        .user-img img
        {
            width: 45px;
            height: 45px;
            padding: 0px 10px 0px 0px;
        }
        .user-info
        {
            margin-top: 2px;
        }
        .user-info span
        {
            display: block;
        }
        .user-info .name
        {
            font-size: 18px;
            font-weight: 600;
        }
        .user-info .email
        {
            font-weight: 400;
            font-size: 14px;
            color:#1a1a27ab;
        }
        .menu-item
        {
            padding: 5px 0px 5px 15px;
            width: fit-content;
            display: flex;
            flex-flow: row;
            align-items: center;
        }
        .menu-item .icon
        {
            padding: 0px 15px 0px 0px;
        }
        .menu-item .icon img
        {
            height: 18px;
            width: 18px;
        }
        .menu-item .title
        {
            font-size: 18px;
            font-weight: 400;
        }
        .logout
        {
            transition: 200ms linear 0s all;
            &:hover{
                opacity: 0.8;
            }
        }
    }
    @keyframes fade {
        from{
            opacity: 0;
            visibility: hidden;
        }
        to{
            opacity: 1;
            visibility: visible;
        }
    }
    /* Nav bar Animation link */
    nav a::before{
        content: "";
        width: 81%;
        height: 3px;
        position: absolute;
        left: 10px;
        bottom: 10px;
        background: #fff;
        transition: 0.5s transform ease;
        transform: scale3d(0,1,1);
        transform-origin: 0 50%;
    }
    nav a:hover::before{
        transform: scale3d(1,1,1);
    }
    nav a::before{
        background: var(--primary-color);
        transform-origin: 100% 50%;
    }
    nav a:hover::before{
        transform-origin: 0 50%;
    }

    nav .login-btn::before
    {
        content: none;
    }
    nav .user-btn::before
    {
        content: none;
    }
    nav a:nth-child(5)::before
    {
        width: 86%;
    }
    nav a:nth-child(2)::before
    {
        width: 78%;
    }
</style>
<header>
    <div onclick="location.href='index';" class="logo"><span>Exam</span>Zone</div>
    <nav>
        <a href="index">Home</a>
        <a href="exam_main">Exam</a>
        <a href="#">Events</a>
        <a href="#">About</a>
        <?php 
            if(!isset($_SESSION['stdLogin']) && empty($_SESSION['stdLogin']))
            {
        ?>
            <a href="student_reg.php" class="login-btn">Login</a>
        <?php
            }
            else
            {
        ?>
            <a href="#" class="user-btn">
                <!-- <svg  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 9C8.25 6.92893 9.92893 5.25 12 5.25C14.0711 5.25 15.75 6.92893 15.75 9C15.75 11.0711 14.0711 12.75 12 12.75C9.92893 12.75 8.25 11.0711 8.25 9ZM12 6.75C10.7574 6.75 9.75 7.75736 9.75 9C9.75 10.2426 10.7574 11.25 12 11.25C13.2426 11.25 14.25 10.2426 14.25 9C14.25 7.75736 13.2426 6.75 12 6.75Z" />
                    <path  fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 14.5456 3.77827 16.851 5.4421 18.5235C5.6225 17.5504 5.97694 16.6329 6.68837 15.8951C7.75252 14.7915 9.45416 14.25 12 14.25C14.5457 14.25 16.2474 14.7915 17.3115 15.8951C18.023 16.6329 18.3774 17.5505 18.5578 18.5236C20.2217 16.8511 21.25 14.5456 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM17.1937 19.6554C17.0918 18.4435 16.8286 17.5553 16.2318 16.9363C15.5823 16.2628 14.3789 15.75 12 15.75C9.62099 15.75 8.41761 16.2628 7.76815 16.9363C7.17127 17.5553 6.90811 18.4434 6.80622 19.6553C8.28684 20.6618 10.0747 21.25 12 21.25C13.9252 21.25 15.7131 20.6618 17.1937 19.6554Z" />
                </svg> -->
                <?php
                    if($_SESSION['userGender'] == 'Male')
                    {
                        echo '<img src="image/userprofile/male1.png" alt="">';
                    }
                    else if($_SESSION['userGender'] == 'Female')
                    {
                        echo '<img src="image/userprofile/female1.png" alt="">';
                    }
                ?>
            </a>
            <div class="profile-menu">
                <div class="user-profile">
                    <div class="user-img">
                    <?php
                        if($_SESSION['userGender'] == 'Male')
                        {
                            echo '<img src="image/userprofile/male1.png" alt="">';
                        }
                        else if($_SESSION['userGender'] == 'Female')
                        {
                            echo '<img src="image/userprofile/female1.png" alt="">';
                        }
                    ?>
                    </div>
                    <div class="user-info">
                        <span class="name"> <?php echo $_SESSION['userName'][1];?> </span>
                        <span class="email"> <?php echo $_SESSION['userMail']?> </span>
                    </div>
                </div>
                <div class="menu-item">
                    <span class="icon"><img  src="image/userprofile/progress.svg" alt=""></span>
                    <span class="title">My Progress</span>
                </div>
                <div class="menu-item logout">
                    <span class="icon"><img src="image/userprofile/logout.svg" alt=""></span>
                    <span class="title">Logout</span>
                </div>
            </div>
        <?php
            }
        ?>
    </nav>
    <script>
        <?php include './js/header.js';?>
    </script> 
</header>
