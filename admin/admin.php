<?php
session_start();
// if(!isset($_SESSION['loged_in']))
// {
//     header('location:admin_login.php');
// }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="icon" type="image/png" href="image/admin/settings.png">
    <style>
        <?php
        include 'css/admin.css';
        include 'css/all.min.css';

        ?>
    </style>

    <script>
        <?php include_once 'js/jquery-3.7.1.min.js'; ?>
    </script>
</head>

<body>
    <header>
        <span>Exam25 </span>

        <div class="logout-btn" onclick="window.location.href='admin_logout.php'">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#fff" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" />
            </svg>
            Logout
        </div>
    </header>
    <section>
        <aside>
            <ul>
                <li onclick="$('#container').load('dash.php');">
                    <span class="icon">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"> -->
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <!-- <path fill="#1c1c38" d="M296 32h192c13.3 0 24 10.7 24 24v160c0 13.3-10.7 24-24 24H296c-13.3 0-24-10.7-24-24V56c0-13.3 10.7-24 24-24zm-80 0H24C10.7 32 0 42.7 0 56v160c0 13.3 10.7 24 24 24h192c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24zM0 296v160c0 13.3 10.7 24 24 24h192c13.3 0 24-10.7 24-24V296c0-13.3-10.7-24-24-24H24c-13.3 0-24 10.7-24 24zm296 184h192c13.3 0 24-10.7 24-24V296c0-13.3-10.7-24-24-24H296c-13.3 0-24 10.7-24 24v160c0 13.3 10.7 24 24 24z" /> -->
                        <!-- </svg> -->
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                            <path d="m0,3v6h11V0H3C1.346,0,0,1.346,0,3Zm13,21h8c1.654,0,3-1.346,3-3v-6h-11v9ZM21,0h-8v13h11V3c0-1.654-1.346-3-3-3ZM0,21c0,1.654,1.346,3,3,3h8v-13H0v10Z" />
                        </svg>

                    </span>
                    <a href="javascript:void(0)"> Dashboard </a>
                </li>
                <li onclick="jQuery('#container').load('student.php');">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#1c1c38" d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z" />
                        </svg>
                    </span>
                    <a href="javascript:void(0)"> Students </a>
                </li>
                <li onclick="jQuery('#container').load('test.php');">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                            <path height="50" width="" d="m6,0C2.686,0,0,2.686,0,6s2.686,6,6,6,6-2.686,6-6S9.314,0,6,0Zm3.692,5.722l-2.712,2.605c-.452.446-1.052.671-1.653.671s-1.204-.225-1.664-.674l-1.132-1.108c-.395-.387-.401-1.02-.015-1.414.386-.395,1.019-.401,1.414-.016l1.132,1.108c.144.142.379.141.522,0l2.723-2.614c.398-.381,1.032-.37,1.414.029.383.398.37,1.031-.029,1.414Zm3.577,9.759c-.813.813-1.27,1.915-1.27,3.065v1.455h1.455c1.15,0,2.252-.457,3.065-1.27l6.807-6.807c.897-.897.897-2.353,0-3.25-.897-.897-2.353-.897-3.25,0l-6.807,6.807Zm7.73,1.598v2.922c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4v-6.589c.927.377,1.939.589,3,.589,4.411,0,8-3.589,8-8,0-.339-.028-.672-.069-1h3.069c1.193,0,2.254.536,2.987,1.367-.48.209-.933.5-1.325.892l-6.808,6.808c-1.187,1.188-1.855,2.798-1.855,4.478v1.455c0,1.105.895,2,2,2h1.455c1.679,0,3.29-.667,4.478-1.855l3.067-3.067Z" />
                        </svg>

                    </span>
                    <a href="javascript:void(0)"> Tests </a>
                </li>
                <li onclick="jQuery('#container').load('result.php');">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#1c1c38" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z" />
                        </svg>
                    </span>
                    <a href="javascript:void(0)"> Results </a>
                </li>
            </ul>
        </aside>
        <div id="container">
            <!-- /// page loaded here /// -->
        </div>
    </section>
</body>
<script>
    jQuery('#container').load('dash.php');
    const listItems = document.querySelectorAll('li');
    const firstList = document.querySelectorAll('li')[0];
    firstList.style.boxShadow = '0px 3px 10px 0 #dac0c0a8 ';
    firstList.style.backgroundColor = '#d6b8b851';
    firstList.style.zIndex = '999';
    listItems.forEach(item => {
        item.addEventListener('click', function() {
            listItems.forEach(item => {
                item.style.boxShadow = 'none';
                item.style.backgroundColor = '#fff';
                item.style.zIndex = '0';

            })
            this.style.boxShadow = '0px 3px 10px 0 #dac0c0a8 ';
            this.style.backgroundColor = '#d6b8b851';
            this.style.zIndex = '999';
        });
    });
    //-----------Show Alert------------//
    function alert_show(value, msg) {
        switch (value) {
            case '1':
                $(".alert h3").text(msg);
                $("#alert-container div").addClass("success-alert");
                $("#alert-container").show().css('display', 'flex');
                break;
            case '0':
                $(".alert h3").text(msg);
                $("#alert-container div").addClass("danger-alert");
                $("#alert-container").show().css('display', 'flex');
                break;
        }
    }
</script>

</html>