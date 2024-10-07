<?php
include_once 'database.php';
include_once 'warehouse.php';

$database = new Database();
$db = $database->getConnection();
$warehouse = new Warehouse($db);

if ($_POST) {
    $warehouse->name = $_POST['name'];
    $warehouse->location = $_POST['location'];
    $warehouse->capacity = $_POST['capacity'];
    $warehouse->opening_hour = $_POST['opening_hour'];
    $warehouse->closing_hour = $_POST['closing_hour'];

    if ($warehouse->create()) {
        echo "<div class='alert alert-success'>Warehouse was created.</div>";
    } else {
        echo "<div class='alert alert-danger'>Unable to create warehouse.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Warehouse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Gudang Baru</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Nama Gudang</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="location">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="capacity">Kapasitas</label>
            <input type="number" class="form-control" id="capacity" name="capacity" required>
        </div>
        <div class="form-group">
            <label for="opening_hour">Waktu Buka</label>
            <input type="time" class="form-control" id="opening_hour" name="opening_hour" required>
        </div>
        <div class="form-group">
            <label for="closing_hour">Waktu Tutup</label>
            <input type="time" class="form-control" id="closing_hour" name="closing_hour" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Gudang</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>