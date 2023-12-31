<?php
include('config_query.php');
$db = new database();
session_start();
$id_users = $_SESSION['id_users'];
$action = $_GET['action'];


if ($action == "add") {
    //Check sampul 

    // echo "<pres>";
    // print_r($_FILES);
    // echo "</pres>";
    // die;

    if ($_FILES["sampul"]["name"] != '') {

        $tmp = explode('.', $_FILES["sampul"]["name"]); //split name - extensions
        $ext = end($tmp); //Get Ext
        $filename = $tmp[0];  //Get File name without Ext
        $allowed_ext = array("jpg", "png", "jpeg"); //Allow Ext

        if (in_array($ext, $allowed_ext)) { //Check valid Ext

            if ($_FILES["sampul"]["size"] <= 5120000) { //check image size, max 5mb
                $name = $filename . '_' . rand() . '.' . $ext; //Rename Image File
                $path = "../files/" . $name; //Path Upload image
                $uploaded = move_uploaded_file($_FILES["sampul"]["tmp_name"], $path); //Move file

                if ($uploaded) {
                    $insertData = $db->add_data($name, $_POST["judul"], $_POST["isi"], $_POST["status_artikel"], $_POST["kategori"], $id_users); //Query Add Data

                    if ($insertData) {
                        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
                        header('Location: index.php');
                        exit();
                    } else {
                        echo "<script>alert('Data Gagal Ditambahkan');</script>";
                        header('Location: tambah_data.php');
                        exit();
                    }
                } else {
                    echo "<script>alert('Gagal Upload file');document.location.href = 'tambah_data.php';</script>";
                }
            } else {
                echo "<script>alert('Ukuran Gambar lebih dari 5mb');document.location.href = 'tambah_data.php';</script>";
            }
        } else {
            echo "<script>alert('File salah ekstensi');document.location.href = 'tambah_data.php';</script>";
        }
    } else {
        echo "<script>alert('Gambar tidak boleh kosong');document.location.href = 'tambah_data.php';</script>";
    }
} elseif ($action == "update") {
    //update data
} elseif ($action == "delete") {
    //delete data
} else {
    echo "<script>alert('No Access operations');document.location.href = 'index.php';</script>";
}
