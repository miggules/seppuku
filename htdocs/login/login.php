<?php

$h1 = 'log in';
$p = 'share your greentext stories with us';

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <link rel="icon" href="assets/icon.png">
    <title>sign EEN</title>
</head>
<body>

<?php include '../nav/nav.php'; ?>

<div>
    <h1 class="sign-h1"><?php print $h1; ?></h1>
    <p class="sign-p"><?php print $p; ?></p>
</div>

<div>
    <form action="../includes/login.inc.php" method="post">
        <input type="text" name="mailuid" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <button class="login" type="submit" name="login-submit">log in</button>
    </form>

    <p>new here? <a href="signup.php">sign up</a></p>
</div>

</body>
</html>