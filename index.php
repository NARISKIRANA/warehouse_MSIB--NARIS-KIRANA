<?php
include_once 'database.php';
include_once 'warehouse.php';

$database = new Database();
$db = $database->getConnection();
$warehouse = new Warehouse($db);

$stmt = $warehouse->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2><strong>Daftar Gudang</strong></h2>
    <a href="add_warehouse.php" class="btn btn-primary mb-3">Tambah Gudang Baru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Waktu Buka</th>
                <th>Waktu Tutup</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['capacity']; ?></td>
                <td><?php echo $row['opening_hour']; ?></td>
                <td><?php echo $row['closing_hour']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php if ($row['status'] == 'aktif') { ?>
                        <a href="edit_warehouse.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_warehouse.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin Menonaktifkan?')">Nonaktifkan</a>
                    <?php } else { ?>
                        <a href="restore_warehouse.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Aktifkan</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
