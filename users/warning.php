<?php
session_start();
echo "you can't delete yourself, please return home";
if(isset($_POST['submit'])){
    header('location: ../home.php');
}
?>
<form method="post"><input type="submit" name="submit" value="GO BACK"></form>
