<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['user'];
    $sleep = $_POST['sleep'];
    $work = $_POST['work'];
    $entertainment = $_POST['entertainment'];
    $study = $_POST['study'];
    $family = $_POST['family'];
    $timestamp = date("Y-m-d H:i:s");

    $data = [$timestamp, $email, $sleep, $work, $entertainment, $study, $family];
    $file = fopen("userdata.csv", "a");
    fputcsv($file, $data);
    fclose($file);
}

header("Location: index.php");
exit();
