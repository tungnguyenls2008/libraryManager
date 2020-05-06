<?php
session_start();
require_once '../conn.php';
if ($_SESSION['user']['role'] == 1) {
if (isset($_POST['add'])) {
    if ($_POST['name'] != "" || $_POST['status'] != "") {
        try {
            $id = $_REQUEST['id'];
            $sql = "UPDATE `books` SET `name`=?,`status`=? WHERE `id`=?";
            $query = $conn->prepare($sql);
            $query->bindParam(1,$_REQUEST['name']);
            $query->bindParam(2,$_REQUEST['status']);
            $query->bindParam(3,$id);
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
