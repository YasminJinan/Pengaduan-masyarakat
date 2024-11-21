<?php
// session = login nya suatu user

session_start();

//menghapus loginan kita
session_destroy();
header('location: login.php');
?>