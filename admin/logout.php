<?php
session_start();

//unset all session var

unset($_SESSION['username']);
unset($_SESSION['id_users']);

//unset all
session_unset();

//destroy session
session_destroy();

//Routing to login
header('location: ../login.php?pesan=logout');
exit;