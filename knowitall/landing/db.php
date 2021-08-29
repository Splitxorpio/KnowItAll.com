<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_table = "login";

    $conn = mysqli_connect($servername, $username, $password, $db_table);
    $error = 0;
?>
<script>
    console.log("connection secure, logged in as" <?php echo $db_table?>)
</script>