<?php
//class database

class database
{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "db_mading";
    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Error Database Connection : " . mysqli_connect_error();
        }
    }

    //Get data table user
    public function get_data_users($username)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_users WHERE username = '$username'");

        return $data;
    }

    // Get data table artikel
    public function show_data()
    {
        $hasil = array();  // Initialize $hasil here

        $data = mysqli_query($this->koneksi, "SELECT id_artikel, sampul, judul, isi, status_artikel, kategori, tba.created_at, tba.updated_at, nama, tba.id_users FROM tb_artikel tba JOIN tb_users tbu ON tba.id_users = tbu.id_users");

        if ($data) {
            if (mysqli_num_rows($data) > 0) {
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
        }

        return $hasil;
    }
}
