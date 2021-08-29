<?php
include "../landing/db.php";
session_start();
if (isset($_POST['register'])) {
    // if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    if (empty($_POST['username'])) {
        header('location: ../landing/login.php');
    }
    if (empty($_POST['password'])) {
        header('location: ../landing/login.php');
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and password = '$password'");
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] == $username && $row['password'] == $password) {
    } else {
        header('location: ../landing/login.php');
    }
}
if (isset($_POST['like'])) {
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $namee = $_POST['name'];
    $result = mysqli_query($conn, "UPDATE courses SET likes = likes + 1 WHERE cname = '$namee'");
}
if (isset($_POST['dislike'])) {
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $namee = $_POST['name'];
    $result = mysqli_query($conn, "UPDATE courses SET dislikes = dislikes + 1 WHERE cname = '$namee'");
}
if (isset($_POST['search'])) {
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
}
if (isset($_POST['goback'])) {
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $password = mysqli_real_escape_string($conn, $_SESSION['password']);
}
function printall()
{
    include "../landing/db.php";
    $result = mysqli_query($conn, "SELECT * FROM courses ORDER by likes DESC");
    $row = mysqli_fetch_assoc($result);
    foreach ($result as $row) {
        echo
        "<div class='card'><h2><a href=" . "courses.php?id=" . $row['cname'] . ">"."<img style='width: 25px; height: 25px;' src='" . $row['img'] . "'> " 
            . $row['cname'] .
            "</a></h2>\n
                    <br>\n
                    <p>By: \n
                    <a href='userprofile.php?id=" . $row['user'] . "'>" .
            $row['user'] . "</a>\n
                    </p>\n
                    <br>" .
            $row['tags'] .
            "<form action='dashboard.php' method='POST'> \n
                <input type='submit' value='👍' name='like' class='like-btn'> " . $row['likes'] . " " .
            "<input type='hidden' id='specific-" . $row['cname'] . "' value='" . $row['cname'] . "' name='name'>" .
            "<input type='submit' value='👎' name='dislike' class='like-btn'> " . $row['dislikes'] . " " .
            "</form>\n" .
            "</div> \n
            <br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="db.css">
</head>

<body>
    <!-- <img src="../img/knowitall.png" class="nav-image"> -->
    <div class="info">
        <img class="avatar" src="https://avatars.dicebear.com/api/bottts/<?php echo $_SESSION['username'] ?>.svg" alt="" />
        <h1><?php echo $username ?></h1>
        <a href="createcourse.php">Create Course</a>
        <br>
        <hr style="width: 20vw; color: solid black;">
        <br>
        <!-- CONTINUE COURSES CARDS -->
        <div>

        </div>
        <form action="../landing/index.php" method="POST">
            <input class="log-out-btn" type="submit" value="Log Out" name="logout">
        </form>

    </div>
    <!-- COURSES LIBRARY -->
    <div class="library">
        <form action="dashboard.php" method="POST" class="search-bar">
            <input class="input" type="text" placeholder="Search Courses..." name="searchcourse">
            <input class="search-btn" type="submit" name="search">
        </form>
        <hr>
        <br>
        <?php
        if (isset($_POST['search'])) {
            if (empty($_POST['searchcourse'])) {
                printall();
            } else {
                $searching = $_POST['searchcourse'];
                $result = mysqli_query($conn, "SELECT * FROM courses where tags LIKE '$searching' or cname LIKE '$searching'");
                $row = mysqli_fetch_assoc($result);
                foreach ($result as $row) {
                    echo
                    "<div class='card'><h2><a href=" . "courses.php?id=" . $row['cname'] . ">" . "<img style='width: 25px; height: 25px;' src='" . $row['img'] . "'> "
                    . $row['cname'] .
                        "</a></h2>\n
                    <br>\n
                    <p>By: \n
                    <a href='userprofile.php?id=" . $row['user'] . "'>" .
                        $row['user'] . "</a>\n
                    </p>\n
                    <br>" .
                        $row['tags'] .
                        "<form action='dashboard.php' method='POST'> \n
                <input type='submit' value='👍' name='like' class='like-btn'> " . $row['likes'] . " " .
                        "<input type='hidden' id='specific-" . $row['cname'] . "' value='" . $row['cname'] . "' name='name'>" .
                        "<input type='submit' value='👎' name='dislike' class='like-btn'> " . $row['dislikes'] . " " .
                        "</form>\n" .
                        "</div> \n
                    <br>";
                }
            }
        } else {
            printall();
        }
        ?>
    </div>

</body>

</html>