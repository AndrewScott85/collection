<?php
require_once 'db.php';
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
$db = 'sandwiches';
$pdo = connectToDB($db);
$sandwich_id = addNewSandwich($pdo, $_POST);
if ($_POST['ingredient1'] !== '-1') {
    addToJunct($pdo, $sandwich_id, $_POST['ingredient1']);
}
if ($_POST['ingredient2'] !== '-1') {
    addToJunct($pdo, $sandwich_id, $_POST['ingredient2']);
}
if ($_POST['ingredient3'] !== '-1') {
    addToJunct($pdo, $sandwich_id, $_POST['ingredient3']);
}
if ($_POST['ingredient4'] !== '-1') {
    addToJunct($pdo, $sandwich_id, $_POST['ingredient4']);
}


header('Location: index.php');
