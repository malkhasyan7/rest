<?php

include 'mysqli_connection.php';

$id = $_POST['id'];
$action = $_POST['action'];

if ($action == 'update_parent') {
    $parent = $_POST['parent'];
    $name = $_POST['name'];

    $query2= "UPDATE category SET parent = '$parent' WHERE id = $id";
    $mysql_query2 = mysqli_query($conn, $query2);

    $query_history = "INSERT INTO category_history values(0, $parent, '$name', 'update parent', NOW())";
    $mysql_query_history = mysqli_query($conn, $query_history);

    if ($mysql_query2) {
        echo json_encode(['success'=>1]);
    } else {
        echo json_encode(['success'=>0]);
    }
    
} elseif($action == 'update_name') {
    $category_name = $_POST["name"];
    $query1= "UPDATE category SET name = '$category_name' WHERE id = $id";
    $mysql_query1 = mysqli_query($conn, $query1);

    $query_history = "INSERT INTO category_history values(0, $id, '$category_name', 'update name', NOW())";
    $mysql_query_history = mysqli_query($conn, $query_history);

    if ($mysql_query1) {
        echo json_encode(['success1'=>1]);
    } else {
        echo json_encode(['success1'=>0]);
    }
}