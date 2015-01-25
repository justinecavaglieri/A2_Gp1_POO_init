<?php
require __DIR__ . '/_header.php';

if (empty($_SESSION['connected']))
    header("Location: login.php");


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';
$pokemonRepository = $em->getRepository('Cartman\Init\Pokemon\Model\PokemonModel');

$pokemon = $pokemonRepository;

$add = $pokemon->getHP() + 100;