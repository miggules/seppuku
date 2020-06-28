<?php

if (isset($_SESSION['userid'])) {
    header('Location: ../core/core_index.php');;
}
else {
    require 'login.php';
}