<?php
session_start();
require_once '../conn.php';
if ($_SESSION['user']['role'] == 1) {
$user_id=$_GET['user-id'];
$book_ids=$_GET['borrow-this'];
//$book_ids=explode(',',$_GET['borrow-this']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `book_borrow` (`id`,`mem_id`, `book_id`) VALUES (NULL,'$user_id', '$book_ids')";
    $conn->exec($sql);
    $conn = null;
    header('location: borrowForm.php');
}
