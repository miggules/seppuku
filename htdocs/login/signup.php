<?php

$h1 = 'sign up';

if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        $p = 'hey.. pay attention and do this right (error)';
    }
    else if ($_GET['error'] == "invalidmailuid") {
        $p = 'are you drunk? (error.. obviously)';
    }
    else if ($_GET['error'] == "invalidmail") {
        $p = 'i used to be an adventurer like you (error)';
    }
    else if ($_GET['error'] == "passwordcheck") {
        $p = 'legally blind, this one is (error)';
    }
}
else {
    $p = "don't let your dreams be dreams";
};

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <link rel="icon" href="assets/icon.png">
    <title>sign AHP</title>
</head>
<body>

<?php include '../nav/nav.php'; ?>

<main>

    <div>
        <h1 class="sign-h1"><?php print $h1; ?></h1>
        <p class="sign-p"><?php print $p; ?></p>
    </div>

    <form action="../includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="username">
        <input type="text" name="mail" placeholder="e-mail">
        <input type="password" name="pwd" placeholder="password">
        <input type="password" name="pwd-repeat" placeholder="repeat da password">
        <button class="signup-submit" type="submit" name="signup-submit">sign up</button>
    </form>

    <p>already got an account? <a href="login.php">sign in</a></p>

</main>
</body>
</html>