<?php
include "../landing/db.php";
session_start();
if (isset($_POST['create'])) {
    $cname = $_POST['cname'];
    $cname = str_replace(" ", "_", $cname);
    $img = $_POST['img'];
    $tags = $_POST['tags'];
    $concent = $_POST['content'];
    $user = $_SESSION['username'];
    $result = $conn->prepare("INSERT into courses (cname, user, img, tags, content) VALUES (?, ?, ?, ?, ?)");
    $result->bind_param("sssss", $cname, $user, $img, $tags, $concent);
    $result->execute();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link rel="stylesheet" href="cc.css">
</head>

<body>
    <p style="margin-left: 5px; margin-top: 10px;"><?php echo "Logged in as " . $_SESSION['username']; ?></p>
    <div class="container">
        <h1>Create Course</h1>
        <hr style="width: 53%; border: 1px solid black; margin-top: 15px; margin-bottom: 15px;">
        <form action="createcourse.php" method="POST">
            <input type="text" name="cname" placeholder="Course Name">
            <br>
            <br>
            <input style="width: 20vw;"type="text" name="img" placeholder="Course Image Link (https://placeholder.(jpg,png)">
            <br>
            <br>
            <input type="text" name="tags" placeholder="Tags (maximum 1)">
            <br>
            <br>
            <textarea style="width: 50vw; height: 25vh; resize: none; border-radius: 15px; outline: none; padding: 15px; border: 1px solid black;" type="text" name="content" placeholder="Course Content"></textarea>
            <br>
            <br>
            <input type="submit" name="create" class="go-back-btn">
        </form>
        <br>
        <br>
        <br>
        <form action="dashboard.php" method="POST">
            <input type="submit" name="goback" value="Go Back" class="go-back-btn">
        </form>
    </div>
</body>

</html>