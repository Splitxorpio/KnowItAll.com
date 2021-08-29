<?php
$userprof = $_GET['id'];
include "../landing/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userprof.css">
</head>

<body>
    <div class="container">
        <div class="info">
            <img class="avatar" src="https://avatars.dicebear.com/api/bottts/<?php echo $userprof ?>.svg" alt="" />
            <h1>
                <?php echo $userprof; ?>
            </h1>
            <hr width="30%">
            <h3> Courses Created By <?php echo $userprof; ?>:</h3>
            <br>
            <ul>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM courses where user = '$userprof'");
                $row = mysqli_fetch_assoc($result);
                foreach ($result as $row) {
                    echo "<li>" . $row['cname'] . "</li>";
                }
                ?>
            </ul>
            <form action="dashboard.php" method="POST">
                <input type="submit" name="goback" value="Go Back">
            </form>
        </div>
    </div>
</body>

</html>