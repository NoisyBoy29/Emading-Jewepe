<?php
//class database

class database{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "db_mading";
    var $koneksi = "";    

    function __construct() 
    {
        $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if(mysqli_connect_errno()){
            echo "Error Database Connection : ". mysqli_connect_error();
        }
    }
    
    //Get data table user
    public function get_data_users($username)
    {
        $data =mysqli_query($this->koneksi, "SELECT * FROM tb_users WHERE username = '$username'");

        return $data;
    }

}
?>