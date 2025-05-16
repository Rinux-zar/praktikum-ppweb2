<?php 

class Kunjungan {
    public $id;
    public $timestamp;
    public $fullname;
    public $email;
    public $jenis_kunjungan_id;

    private static function connect(){
        $conn = mysqli_connect("localhost", "root", "", "bukutamu");

        if(!$conn){
            die("Connection Failed" . mysqli_connect_error());
        }

        return $conn;
    }

    public function save(){
        $conn = self::connect();
        $query = "INSERT INTO kunjungan (fullname, email, jenis_kunjungan_id)
            VALUES ('{$this->fullname}', '{$this->email}', {$this->jenis_kunjungan_id})";
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        return $result;
    }

    public static function getAll(){
        $conn = self::connect();
        $query = "SELECT * FROM kunjungan";
        // Eksekusi query
        $result = mysqli_query($conn, $query);
        // Close Connection
        mysqli_close($conn);

        $entries = [];
        while($row = mysqli_fetch_assoc($result)){
            $entry = new Kunjungan();
            $entry->id = $row['id'];
            $entry->timestamp = $row['timestamp'];
            $entry->fullname = $row['fullname'];
            $entry->email = $row['email'];
            $entry->jenis_kunjungan_id = $row['jenis_kunjungan_id'];

            array_push($entries, $entry);
        }

        return $entries;
    }
}