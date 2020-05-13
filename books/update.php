<?php
session_start();
require_once '../conn.php';
if ($_SESSION['user']['role'] == 1) {
if (isset($_POST['add'])) {
    if ($_POST['name'] != "" || $_POST['status'] != "") {
        try {
            $id = $_REQUEST['id'];
            $sql = "UPDATE `books` SET `name`=?,`status`=?, `author`=?, `description`=?, `category`=?, `cover`=? WHERE `id`=?";
            $query = $conn->prepare($sql);
            $query->bindParam(1,$_REQUEST['name']);
            $query->bindParam(2,$_REQUEST['status']);
            $query->bindParam(3,$_REQUEST['author']);
            $query->bindParam(4,$_REQUEST['description']);
            $query->bindParam(5,$_REQUEST['category']);
            $query->bindParam(6,$_REQUEST['cover']);
            $query->bindParam(7,$id);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $conn = null;
        header('location:display.php');
    } else {
        echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'addForm.php'</script>
			";
    }
}}
else echo "You're at the wrong place, buddy.";
