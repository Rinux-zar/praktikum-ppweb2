<?php
require_once('BukuTamu.php');
session_start();

if(!isset($_SESSION['bukuTamu'])){
    $_SESSION['bukuTamu'] = [];
}

if(isset($_POST['submit'])){
    //membuat object dari class bukuTamu
    $bukuTamu = new BukuTamu();

    
    //mengisi properti timestamp dengan fungsi
    //Y-m-d H:i:s artinya
    $bukuTamu->timestamp = date('Y-m-d H:i:s');
    $bukuTamu->fullname = $_POST['fullname'];
    $bukuTamu->email = $_POST['email'];
    $bukuTamu->massage = $_POST['massage'];

    array_push($_SESSION['bukuTamu'], $bukuTamu);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Daftar Kunjungan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Keperluan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['bukuTamu'] as $entry): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($entry->timestamp); ?></td>
                        <td><?php echo htmlspecialchars($entry->fullname); ?></td>
                        <td><?php echo htmlspecialchars($entry->email); ?></td>
                        <td><?php echo htmlspecialchars($entry->massage); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php">&lt;&lt;&lt;Kembali</a>
    </div>
    
</body>
</html>