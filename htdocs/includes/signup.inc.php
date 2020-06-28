<?php

if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
        header("Location: ../login/signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
        header("Location: ../login/signup.php?error=invalidmailuid");
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login/signup.php?error=invalidmail&uid=" . $username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../login/signup.php?error=invaliduid&mail=" . $email);
        exit();
    }
    else if ($password !== $passwordrepeat) {
        header("Location: ../login/signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {

        $sql = "SELECT uid FROM users WHERE uid=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login/signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if ($resultcheck > 0) {
                header("Location: ../login/signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (uid, emailusers, pwdusers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../login/signup.php?error=sqlerror");
                    exit();
                }
                else {

                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../login/login.php');
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../login/signup.php");
    exit();
}