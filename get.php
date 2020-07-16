<?php

include 'mysqli_connection.php';

$result = ['success'=>'true'];

function buildTree(array &$elements, $parentId = 0) {
    $branch = array();
    foreach ($elements as &$element) {

        if ($element['parent'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[$element['id']] = $element;
            unset($element);
        }
    }
    return $branch;
}
function getHistory() {
    global $conn;
    $query1 = "SELECT * FROM category_history";
    $res = $conn->query($query1);

    if ($res) {
        $history = $res->fetch_all(MYSQLI_ASSOC);
    } else {
        $result = ['success'=>'false'];
    }
    return $history;
}
$query = "SELECT * FROM category";
$res = $conn->query($query);

 if($res){
 	$all = $res->fetch_all(MYSQLI_ASSOC);
     $result['result'] = buildTree($all);
     $result['flat'] = $all;
     $result['history'] = getHistory();
 } else {
 	$result = ['success'=>'false'];
};

echo json_encode($result);

?>