<?php
if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- AARUSHI -->
    <!--NAVIGATION BAR-->
    <a href="index.php"><img src="../img/knowitall.png" class="nav-image"></a>
    <button class="openbtn" onclick="openNav()">&#9776;</button>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <strong><a href="index.php">Home</a></strong>
        <strong><a href="signup.php">Sign Up</a></strong>
        <strong><a href="login.php">Sign In</a></strong>
    </div>
    <!-- ARNAV -->
    <div class="container">
        <div class="title">
            <h1 class="text-1">The Best Way To <span class="words text-2"></span><span class="letter-changer text-2"></span><span class="accessibility text-2"></span></h1>
            <a class="link" href="#">Start Today</a>
        </div>
        <div class="arrow">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="containertwo">
        <h1>Learn From Others!</h1>
        <br>
        <hr width="10%">
        <br>
        <h2>Take Courses made by talented users of KnowItAll.com </h2>
        <br>
        <h3>Us Versus Other Learning Platforms:</h3>
        <br>
        <ul>
            <li>Courses Made By the Community</li>
            <li>You Can Make Your Own Courses</li>
            <li>Courses are Diverse, Learn from Math to Art. Anything!</li>
            <li>Rate Courses, show the community what courses are the best!</li>
        </ul>
    </div>
    <script>
        /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
</body>

</html>