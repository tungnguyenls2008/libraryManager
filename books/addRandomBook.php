<?php
session_start();
require_once '../conn.php';
if ($_SESSION['book'] == $_REQUEST['id']) {
    header('location: warning.php');
} else {
    $id = $_REQUEST['id'];
    $randomBookName = generateRandomString(8);

    $sql = "INSERT INTO `books` (`id`, `name`, `status`) VALUES (NULL,'$randomBookName',1)";
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
        $string.=' ';
    }

    return $string;
}