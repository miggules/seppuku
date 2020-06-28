<?php

function displaybackground()
{
    $background = array(
        "home/assets/uganda.jpg",
        "home/assets/pika.jpg",
        "home/assets/corona.jpg",
        "home/assets/bongo.png"
    );

    $random = array_rand($background);
    $randomimg = $background[$random];

    print "<img class=\"background\" src=\"$randomimg\">";
};

$h1 = 'world wide web';
$p = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?';

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="home\main.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">

        <link rel="icon" href="home/assets/icon.png">
        <title>welcome home</title>

        <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navigation">
            <?php include '..\htdocs\nav\nav.php'; ?>
        </div>
        <div class="wrapper">
            <h1 id="www"><?php print $h1; ?></h1>

            <script>
                $(document).ready(function () {

                    $("#www").click(function () {
                        alert("you clicked it bis");
                    });

                });
            </script>

            <p><?php print $p; ?></p>
        </div>

        <div class="background">
            <?php displaybackground(); ?>
        </div>
    </body>
</html>