<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Progress</title>
    <style>
        <?php include 'css/userprogress.css';?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <?php include 'include/header.php'; ?>
    <section>
        <div class="container">
            <div class="titleWrapper">
                <span class="title">Progress</span>
            </div>
            <div class="testContainer">
                <table>
                    <thead>
                        <tr>
                            <th>Last Attempted</th>
                            <th>Test Name</th>
                            <th>Test Time</th>
                            <th>Test Date</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <!-- Test display -->
                    <tbody>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                        <tr>
                            <td>22/09/2024</td>
                            <td>PHP TEST</td>
                            <td>30 minutes</td>
                            <td>22/09/2024</td>
                            <td>30</td>
                            <td>20</td>
                            <td>PASS</td>
                        </tr>
                    </tbody>
                </table>
                <div class="pagging">
                    <span> < </span>
                    <span> 1 </span>
                    <span> 2 </span>
                    <span> > </span>
                </div>
            </div>
        </div>
    </section>
</body>
</html>