<?php

class jenisKunjungan{
    public $id;
    public $name;
    public $display_name;

    private static function connect(){
        $conn = mysqli_connect("localhost", "root", "", "bukutamu");

        if(!$conn){
            die("Connection Failed" . mysqli_connect_error());
        }

        return $conn;
    }

    public static function getAll(){
        $conn = self::connect();
        $query = "SELECT * FROM jenis_kunjungan";
        // Eksekusi query
        $result = mysqli_query($conn, $query);
        // Close Connection
        mysqli_close($conn);

        $entries = [];
        while($row = mysqli_fetch_assoc($result)){
            $entry = new jenisKunjungan();
            $entry->id = $row['id'];
            $entry->name = $row['name'];
            $entry->display_name = $row['display_name'];

            array_push($entries, $entry);
        }

        return $entries;
    }
}