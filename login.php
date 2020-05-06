<?php
session_start();

require_once 'conn.php';

if (isset($_POST['login'])) {
    if ($_POST['username'] != "" || $_POST['password'] != "") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `member` WHERE `username`=? AND `password`=? ";
        $query = $conn->prepare($sql);
        $query->execute(array($username, $password));
        $row = $query->rowCount();
        $fetch = $query->fetch();

        $sqlBook = "SELECT * FROM `books` ";
        $queryBook = $conn->prepare($sqlBook);
        $queryBook->execute();
        $resultsBook = $queryBook->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['book'] = $resultsBook;
        if ($row > 0) {
            $_SESSION['user'] = $fetch;
            header("location: home.php");
        } else {
            echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'index.php'</script>
				";
        }
    } else {
        echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
    }
}
