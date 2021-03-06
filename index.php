<?php
require __DIR__ . '/_header.php';


if (empty($_SESSION['connected']))
    header("Location: login.php");

$em = require __DIR__.'/bootstrap.php';
$pokemonRepository = $em->getRepository('Cartman\Init\Pokemon\Model\PokemonModel');

$pokemon = $pokemonRepository;

$connected= $_SESSION['connected'];
$homeSession = $_SESSION;


echo $twig->render('index.html.twig', [
    'pokemon' => $pokemon,
    'connected' => $connected,
    'homeSession' => $homeSession,
]);