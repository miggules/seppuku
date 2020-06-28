<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("location: ../login/user_index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE uid = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login/user_index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passwordcheck = password_verify($password, $row['pwdusers']);
                if ($passwordcheck == false) {
                    header("location: ../login/user_index.php?error=wrongpwd");
                    exit();
                }
                else if ($passwordcheck == true) {

                    session_start();
                    $_SESSION['userid'] = $row['idusers'];
                    $_SESSION['useruid'] = $row['uid'];

                    header('Location: ../core/core_index.php');
                    exit();

                }
                else {
                    header("location: ../login/user_index.php?error=wrongpwd");
                    exit();
                }
            }
            else {
                header("location: ../login/user_index.php?error=nouser");
                exit();
            }
        }
    }

}
else {
    header("location: ../login/user_index.php");
    exit();
}