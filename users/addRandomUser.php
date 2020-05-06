<?php
session_start();
require_once '../conn.php';
if ($_SESSION['user'] == $_REQUEST['id']) {
    header('location: warning.php');
} else {
    $id = $_REQUEST['id'];
    $randFirstName = generateRandomString(5);
    $randLastName = generateRandomString(5);
    $randUserName = generateRandomString(5);
    $sql = "INSERT INTO `member` (`mem_id`,`role`, `firstname`, `lastname`, `username`, `password`) VALUES (NULL,0 ,'$randFirstName', '$randLastName', '$randUserName', '123')";
    $query = $conn->prepare($sql);
    $query->execute();

    header('Location: display.php');
}
function generateRandomString($length = 10)
{
    $string = '';
    $vowels = array("ei","ang","ing", "ay", "ya", "yo", "ai", "eight", "aia", "er","uyen","ung","ieu","inh","on","ong");
    $consonants = array(
        'zh', 'th', 'tr', 'gi', 'gh', 'br', 'ch', 'nh', 'ng', 'sh', 'wh', 'str', 'ngh','t','h'
    );
    srand((double)microtime() * 1000000);
    $max = $length / 2;
    for ($i = 1; $i <= $max; $i++) {
        $string .= $consonants[rand(0, 15)];
        $string .= $vowels[rand(0, 14)];
        $string.='_';
    }

    return $string;
}