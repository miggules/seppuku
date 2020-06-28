<?php

function setpost($conn) {
    if (isset($_POST['blogsubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $post = $_POST['message'];

        $sql = "INSERT INTO blog (uid, date, message) VALUES ('$uid', '$date', '$post')";
        $result = $conn -> query($sql);
    }
}

function getpost($conn) {

    $sql = "SELECT * FROM blog";
    $result = $conn -> query($sql);

    while ($row = $result -> fetch_assoc()) {

        $id = $row['uid'];
        $usernamesql = "SELECT * FROM users WHERE idusers = '$id'";
        $usernameresult = $conn -> query($usernamesql);

        if ($usernamerow = $usernameresult -> fetch_assoc()) {

            print "<div class='post-wrapper'>";
            print "<p class='username'>".$usernamerow['uid']."</p>";
            print "<p class='date'>".$row['date']."</p>";
            print nl2br("<p class='prevpost'>".$row['message']."</p>");

            if ($_SESSION['userid'] == $row['uid']) {
                print
                    "<form class='delete-form' method='POST' action='".deletepost($conn)."'>
                    <input type='hidden' name='bid' value='".$row['bid']."'>
                    <button class='delete' type='submit' name='postdelete'>delete</button>
                 </form>";
            }

            print "</div>";

        }
    }
}

function deletepost($conn) {
    if (isset($_POST['postdelete'])) {
        $bid = $_POST['bid'];

        $sql = "DELETE FROM blog WHERE bid = '$bid'";
        $result = $conn -> query($sql);
        header("core/core_index.php");
    }
};