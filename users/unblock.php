<?php
session_start();
require_once '../conn.php';
if ($_SESSION['user']['role'] == 1){
    if ($_SESSION['user'] == $_REQUEST['id']) {
        header('location: warning.php');
    } else {
        $id = $_REQUEST['id'];
        $sql = "UPDATE `member` SET `status` = '0' WHERE `member`.`mem_id` ='$id' ";
        $query = $conn->prepare($sql);
        $query->execute();

        header('Location: display.php');
    }}
else echo "you're in a wrong place, buddy";