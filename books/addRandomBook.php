<?php
session_start();
require_once '../conn.php';

$randomBookName = generateRandomString(8);
$randomBookAuthor = generateRandomString(6);

$randomBookCategory = rand(1, 6);
if ($randomBookCategory == 1) {
    $randomBookCategory = 'action-adventure';
} else if ($randomBookCategory == 2) {
    $randomBookCategory = 'comic-graphic';
} else if ($randomBookCategory == 3) {
    $randomBookCategory = 'crime-detective';
} else if ($randomBookCategory == 4) {
    $randomBookCategory = 'drama';
} else if ($randomBookCategory == 5) {
    $randomBookCategory = 'fairy-tale';
} else if ($randomBookCategory == 6) {
    $randomBookCategory = 'classic';
}
$randomBookDescription = generateRandomString(30);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO `books` (`id`, `name`,`author`,`category`,`cover`,`description`, `status`) VALUES (NULL,'$randomBookName','$randomBookAuthor','$randomBookCategory',NULL,'$randomBookDescription',1)";
$conn->exec($sql);
$conn = null;
header('Location: display.php');

function generateRandomString($length = 10)
{
    $string = '';
    $vowels = array("ei", "ang", "ing", "ay", "ya", "yo", "ai", "eight", "aia", "er", "uyen", "ung", "ieu", "inh", "on", "ong");
    $consonants = array(
        'zh', 'th', 'tr', 'gi', 'gh', 'br', 'ch', 'nh', 'ng', 'sh', 'wh', 'str', 'ngh', 't', 'h'
    );
    srand((double)microtime() * 1000000);
    $max = $length / 2;
    for ($i = 1; $i <= $max; $i++) {
        $string .= $consonants[rand(0, 14)];
        $string .= $vowels[rand(0, 14)];
        $string .= ' ';
    }

    return $string;
}