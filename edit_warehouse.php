<?php
include_once 'database.php';
include_once 'warehouse.php';

$database = new Database();
$db = $database->getConnection();
$warehouse = new Warehouse($db);

$warehouse->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

if ($_POST) {
    $warehouse->name = $_POST['name'];
    $warehouse->location = $_POST['location'];
    $warehouse->capacity = $_POST['capacity'];
    $warehouse->opening_hour = $_POST['opening_hour'];
    $warehouse->closing_hour = $_POST['closing_hour'];

    if ($warehouse->update()) {
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger'>Unable to update warehouse.</div>";
    }
}

$stmt = $warehouse->read();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Warehouse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Warehouse</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Warehouse Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['location']; ?>" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo $row['capacity']; ?>" required>
        </div>
        <div class="form-group">
            <label for="opening_hour">Opening Hour</label>
            <input type="time" class="form-control" id="opening_hour" name="opening_hour" value="<?php echo $row['opening_hour']; ?>" required>
        </div>
        <div class="form-group">
            <label for="closing_hour">Closing Hour</label>
            <input type="time" class="form-control" id="closing_hour" name="closing_hour" value="<?php echo $row['closing_hour']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
