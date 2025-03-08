<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        <?php include 'css/contact.css';?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <?php include_once 'include/loader.php';?>
    <?php include 'include/header.php';?>
    <section>
        <div class="main-container">
            <form action="#" class="form-container">
                <div class="title">Contact us</div>
                <input type="text" id="userName" name="userName" placeholder="Your Name" required/>
                <input type="text" id="userEmail" name="userEmail" placeholder="Your Email" required/>
                <textarea name="userMessage" id="userMessage" placeholder="Your Message" required></textarea>
                <input type="submit" id="userSubmit" name="userSubmit" value="Send Message"/>
            </form>
            <div class="img-container">
                <img src="image/contact5.png" alt="#">
            </div>
        </div>
    </section>
</body>
</html>