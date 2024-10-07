<?php
include_once 'database.php';
include_once 'warehouse.php';

$database = new Database();
$db = $database->getConnection();
$warehouse = new Warehouse($db);

$warehouse->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

if ($warehouse->delete()) {
    header("Location: index.php");
} else {
    echo "<div class='alert alert-danger'>Unable to delete warehouse.</div>";
}
?>
