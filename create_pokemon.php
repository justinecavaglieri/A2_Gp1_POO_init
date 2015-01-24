<?php
require __DIR__ . '/_header.php';

if (empty($_SESSION['connected']))
    header("Location: login.php");


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use \Cartman\Init\Pokemon\Model\PokemonModel;

$pokemonRepository = $em->getRepository('Cartman\Init\Pokemon\Model\PokemonModel');

$pokemons = $pokemonRepository->findOneBy(array('user_id' => $_SESSION['id']));

if ($pokemons == true) {
    header('Location: error.php');
}


$pokemon = new PokemonModel();

if (!empty($_POST['username']) && !empty($_POST['type'])) {
    $username = $_POST['username'];
    $type = $_POST['type'];
    $pokemon = new PokemonModel();
    $pokemon
        ->setusername($username)
        ->settype($type)
        ->setUserId($_SESSION['id']);
    ;

    $em->persist($pokemon);
    $em->flush();
    echo $username.' created!';
}

$connected= $_SESSION['connected'];
$homeSession = $_SESSION;

echo $twig->render('pokemon_new.html.twig', [
    'pokemon' => $pokemon,
    'connected' => $connected,
    'homeSession' => $homeSession,
]);


