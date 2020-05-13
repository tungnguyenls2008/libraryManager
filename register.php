<?php
session_start();
require_once 'conn.php';
if (isset($_POST['register'])) {
    if ($_POST['firstname'] != "" || $_POST['username'] != "" || $_POST['password'] != "" || $_POST['email'] != "" || $_POST['address'] != ""|| $_POST['phone'] != "") {
        try {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone=$_POST['phone'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `member` (`mem_id`,`role`,`status`, `firstname`, `lastname`, `username`, `password`,`email`,`address`,`phone`,`ticket_history`) VALUES (NULL,0 ,0,'$firstname', '$lastname', '$username', '$password','$email','$address',$phone,NULL) ";
            $conn->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $conn = null;
        header('location:index.php');
    } else {
        echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registration.php'</script>
			";
    }
}
