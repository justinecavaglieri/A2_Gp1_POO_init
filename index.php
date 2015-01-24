<?php
require __DIR__ . '/_header.php';

if (empty($_SESSION['connected']))
    header("Location: login.php");


$connected= $_SESSION['connected'];
$homeSession = $_SESSION;


echo $twig->render('index.html.twig', [
    'connected' => $connected,
    'homeSession' => $homeSession,
]);