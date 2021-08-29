<?php
include "../landing/db.php";
$coursename = $_GET['id'];
session_start();
$result = mysqli_query($conn, "SELECT * FROM courses where cname = '$coursename'");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course - <?php echo $row['cname'] ?></title>
        <link rel="stylesheet" href="course.css">
    </head>
    <body>
        <div class="container">

            <br>
            <div class="content">
                <br>
                <?php echo $row['content']?>
                <p style="font-size: 15px; position:absolute; top: 98%; left: 10px; bottom: 15px;"><a href="userprofile.php?id=<?php $row['user']?>"><?php echo "Written By ". $row['user'] ?></a></p>
            </div>

            <form action="dashboard.php" method="POST">
                <input type="submit" name="goback" value="Go Back" class="submit-btn">
            </form>
        </div>
    </body>
</html>