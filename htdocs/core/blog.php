<?php

require '../includes/dbh.inc.php';
require '../includes/blogposts.inc.php';

date_default_timezone_set('Europe/Vilnius');
$datetime = date('Y-m-d H:i:s');

session_start();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <link rel="icon" href="assets/icon.png">
    <title>talk bad about 'em</title>
</head>
<body>

<div class="nav">
    <?php include '../nav/nav.php'; ?>
</div>

<main>
    <div class="wrapper">
        <form class="postform" method="POST" action="<?php setpost($conn); ?>">
            <input type="hidden" name="uid" value="<?php print $_SESSION['userid'];?>">
            <textarea name="message" placeholder="write away your emotions . ."></textarea>
            <input type="hidden" name="date" value='<?php print $datetime; ?>'>
            <button class="post" name="blogsubmit" type="submit">post</button>
        </form>

        <?php getpost($conn); ?>
    </div>

    <div class="content">

    </div>
</main>
</body>
</html>