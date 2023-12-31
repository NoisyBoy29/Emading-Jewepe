<?php

// $pass = password_hash('admin123',PASSWORD_DEFAULT);
// var_dump($pass);
// die;

include('admin/config_query.php');
$db = new database();

//init session
session_start();

//Check Active Session
if (isset($_SESSION['username']) || isset($_SESSION['id_users'])) {
    header('location: admin/index.php');

    // $data = "ok session";
    // var_dump($data);
    // die;
} else {

    // $data = "no session";
    // var_dump($data);
    // die;

    //Check Submit Form
    if (isset($_POST['submit'])) {

        // var_dump($_POST['password']);
        // die;

        //remove backslash
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        //Check username password value
        if (!empty(trim($username)) && !empty(trim($password))) {
            //select data tb_users based username

            // var_dump($username);
            // die;

            $query = $db->get_data_users($username);

            if ($query) {
                $rows = mysqli_num_rows($query);
            } else {
                $rows = 0;
            }

            // var_dump($rows);
            // die;

            //Check username availibility
            if ($rows != 0) {
                $getData = $query->fetch_assoc();

                // var_dump($getPassword);
                // die;

                if (password_verify($password, $getData['password'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['id_users'] = $getData['id_users'];

                    header('location: admin/index.php');
                } else {
                    header("location: login.php?pesan=gagal");
                }
            } else {
                header("location: login.php?pesan=notfound");
            }
        } else {
            header("location:login.php?pesan=empty");
        }
    } else {
        header("location: login.php?pesan=empty");
    }
}
