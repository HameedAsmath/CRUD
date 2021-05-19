<?php
require_once "../../database.php";



$id = $_POST['id'] ?? null;
if (!$id) {
    header('LOCATION: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header("LOCATION: index.php");
