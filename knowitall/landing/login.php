<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <form method="POST" action="../main/dashboard.php" class="login-form">
        <input type="text" placeholder="username" name="username" id="circle">
        <input type="password" placeholder="password" name="password" id="circle">
        <input type="submit" name="register" id="circle" class="submit">
        <div class="g-recaptcha" data-sitekey="6LdaYhgcAAAAAOlRvg-fili6zKkmjSZeQwOMjYsg" name="notbot"></div>
    </form>
</body>


</body>

</html>