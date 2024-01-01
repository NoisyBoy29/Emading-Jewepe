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
    // Update data

    $id_artikel = $_GET['id_artikel'];

    // Check if article ID is provided
    if (isset($id_artikel)) {
        $artikel = $db->get_artikel_by_id($id_artikel);

        // Check if the article exists
        if ($artikel) {
            // Proceed with update

            // Check sampul 
            if ($_FILES["sampul"]["name"] != '') {
                $tmp = explode('.', $_FILES["sampul"]["name"]);
                $ext = end($tmp);
                $filename = $tmp[0];
                $allowed_ext = array("jpg", "png", "jpeg");

                if (in_array($ext, $allowed_ext)) {
                    if ($_FILES["sampul"]["size"] <= 5120000) {
                        $name = $filename . '_' . rand() . '.' . $ext;
                        $path = "../files/" . $name;
                        $uploaded = move_uploaded_file($_FILES["sampul"]["tmp_name"], $path);

                        if ($uploaded) {
                            // Update data in the database
                            $updateData = $db->update_data($id_artikel, $name, $_POST["judul"], $_POST["isi"], $_POST["status_artikel"], $_POST["kategori"]);

                            if ($updateData) {
                                echo "<script>alert('Data Berhasil Diupdate');</script>";
                                header('Location: index.php');
                                exit();
                            } else {
                                echo "<script>alert('Data Gagal Diupdate');</script>";
                                header("Location: update_data.php?id_artikel=$id_artikel");
                                exit();
                            }
                        } else {
                            echo "<script>alert('Gagal Upload file');document.location.href = 'update_data.php?id_artikel=$id_artikel';</script>";
                        }
                    } else {
                        echo "<script>alert('Ukuran Gambar lebih dari 5mb');document.location.href = 'update_data.php?id_artikel=$id_artikel';</script>";
                    }
                } else {
                    echo "<script>alert('File salah ekstensi');document.location.href = 'update_data.php?id_artikel=$id_artikel';</script>";
                }
            } else {
                // If no new image is uploaded, update data without changing the image
                $updateData = $db->update_data($id_artikel, $artikel['sampul'], $_POST["judul"], $_POST["isi"], $_POST["status_artikel"], $_POST["kategori"]);

                if ($updateData) {
                    echo "<script>alert('Data Berhasil Diupdate');</script>";
                    header('Location: index.php');
                    exit();
                } else {
                    echo "<script>alert('Data Gagal Diupdate');</script>";
                    header("Location: update_data.php?id_artikel=$id_artikel");
                    exit();
                }
            }
        } else {
            // Article not found
            echo "<script>alert('Artikel tidak ditemukan');document.location.href = 'index.php';</script>";
        }
    } else {
        // ID not provided
        echo "<script>alert('ID Artikel tidak ditemukan');document.location.href = 'index.php';</script>";
    }
    // Update data

    $id_artikel = $_GET['id_artikel'];

    // Check if article ID is provided
    if (isset($id_artikel)) {
        $artikel = $db->get_artikel_by_id($id_artikel);

        // Check if the article exists
        if ($artikel) {
            // Proceed with update

            // Check sampul 
            if ($_FILES["sampul"]["name"] != '') {
                $tmp = explode('.', $_FILES["sampul"]["name"]);
                $ext = end($tmp);
                $filename = $tmp[0];
                $allowed_ext = array("jpg", "png", "jpeg");

                if (in_array($ext, $allowed_ext)) {
                    if ($_FILES["sampul"]["size"] <= 5120000) {
                        $name = $filename . '_' . rand() . '.' . $ext;
                        $path = "../files/" . $name;
                        $uploaded = move_uploaded_file($_FILES["sampul"]["tmp_name"], $path);

                        if ($uploaded) {
                            // Update data in the database
                            $updateData = $db->update_data($id_artikel, $name, $_POST["judul"], $_POST["isi"], $_POST["status_artikel"], $_POST["kategori"]);

                            if ($updateData) {
                                echo "<script>alert('Data Berhasil Diupdate');</script>";
                                header('Location: index.php');
                                exit();
                            } else {
                                echo "<script>alert('Data Gagal Diupdate');</script>";
                                header("Location: update_data.php?id_artikel=$id_artikel");
                                exit();
                            }
                        } else {
                            echo "<script>alert('Gagal Upload file');document.location.href = 'update_data.php?id_artikel=$id_artikel';</script>";
                        }
                    } else {
                        echo "<script>alert('Ukuran Gambar lebih dari 5mb');document.location.href = 'update_data.php?id_artikel=$id_artikel';</script>";
                    }
                } else {
                    echo "<script>alert('File salah ekstensi');document.location.href = 'update_data.php?id_artikel=$id_artikel';</script>";
                }
            } else {
                // If no new image is uploaded, update data without changing the image
                $updateData = $db->update_data($id_artikel, $artikel['sampul'], $_POST["judul"], $_POST["isi"], $_POST["status_artikel"], $_POST["kategori"]);

                if ($updateData) {
                    echo "<script>alert('Data Berhasil Diupdate');</script>";
                    header('Location: index.php');
                    exit();
                } else {
                    echo "<script>alert('Data Gagal Diupdate');</script>";
                    header("Location: update_data.php?id_artikel=$id_artikel");
                    exit();
                }
            }
        } else {
            // Article not found
            echo "<script>alert('Artikel tidak ditemukan');document.location.href = 'index.php';</script>";
        }
    } else {
        // ID not provided
        echo "<script>alert('ID Artikel tidak ditemukan');document.location.href = 'index.php';</script>";
    }
} elseif ($action == "delete") {
    //delete data
} else {
    echo "<script>alert('No Access operations');document.location.href = 'index.php';</script>";
}
