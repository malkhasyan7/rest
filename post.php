<?php

include 'mysqli_connection.php';

$parent = $_POST['parent'];
$name = $_POST['name'];

$query = "INSERT INTO category (name, parent) values ('$name', $parent)";
$mysql_query = mysqli_query($conn, $query);

$query_history = "INSERT INTO category_history values(0, $parent, '$name', 'create category', NOW())";
$mysql_query_history = mysqli_query($conn, $query_history);

if ($mysql_query) {
    echo json_encode(['success'=>1]);
} else {
    echo json_encode(['success'=>0]);
}