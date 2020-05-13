<?php
session_start();
require_once '../conn.php';
if ($_SESSION['user']['role'] == 1) {
    if (isset($_POST['add'])) {
        if ($_POST['name'] != "" || $_POST['status'] != "") {
            try {
                $id = $_REQUEST['id'];
                $id=$_POST['mem_id'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone=$_POST['phone'];
                $sql = "UPDATE `member` SET `firstname`=?,`lastname`=?, `password`=?, `email`=?, `address`=?, `phone`=? WHERE `id`=?";
                $query = $conn->prepare($sql);
                $query->bindParam(1,$_POST['firstname']);
                $query->bindParam(2,$_POST['lastname']);
                $query->bindParam(3,$_POST['password']);
                $query->bindParam(4,$_POST['email']);
                $query->bindParam(5,$_POST['address']);
                $query->bindParam(6,$_POST['phone']);
                $query->bindParam(7,$_POST['mem_id']);
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $conn = null;
            header('location:profile.php');
        } else {
            echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'addForm.php'</script>
			";
        }
    }
} else echo "You're at the wrong place, buddy.";
