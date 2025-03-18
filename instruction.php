<!DOCTYPE html>
<html>

<head>
    <title>Online Test Instructions</title>
    <style>
        <?php include_once 'css/instruction.css';
        ?>
    </style>
</head>

<body>
    <div class="container">
        <h1>Online Test Instructions</h1>
        <p>Please read the following instructions carefully before starting the test:</p>
        <ol>
            <li>Ensure you have a stable internet connection throughout the test.</li>
            <li>The test consists of multiple-choice questions.</li>
            <li>There is no negative marking.</li>
            <li>You can review and change your answers before submitting the test.</li>
            <li>Do not refresh the page or close the browser window during the test.</li>
            <li>If you experience any technical issues, contact the support team immediately.</li>
        </ol>
        <br>
        <span>
            <input type="checkbox" id="agree"> I have read and understood the instructions
        </span>
        <br><br>
        <button id="startTest">Start Test</button>
    </div>

    <script>
        document.getElementById('startTest').addEventListener('click', function() {
            if (document.getElementById('agree').checked) {
                window.location.href = 'test.html';
            } else {
                alert('Please check the checkbox to confirm you have read the instructions.');
            }
        });
    </script>
</body>

</html>