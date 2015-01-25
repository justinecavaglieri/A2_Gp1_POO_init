<?php
require __DIR__ . '/_header.php';


if (empty($_SESSION['connected']))
    header("Location: login.php");

use \Cartman\Init\Pokemon\Model\PokemonModel;
use \Cartman\Init\Trainer\Model\TrainerModel;

/** @var \Doctrine\ORM\EntityManager  $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $pokemonRepository */
$pokemonRepository = $em->getRepository('Cartman\Init\Pokemon\Model\PokemonModel');
/** @var \Doctrine\ORM\EntityRepository $userRepository */
$userRepository = $em->getRepository('Cartman\Init\Trainer\Model\TrainerModel');


/** @var TrainerModel $user */
$user = $userRepository->find($_SESSION['id']);
/** @var PokemonModel $pokemon */
$pokemon  = $pokemonRepository->findOneBy(array('user_id' => $_SESSION['id']));


$lastBattle = $user->getLastBattle();
$time = strtotime("now");

$leftTime = $time - $lastBattle <= (3600*6);

$connected= $_SESSION['connected'];
$homeSession = $_SESSION;


echo $twig->render('index.html.twig', [
    'leftTime' =>$leftTime,
    'pokemon' => $pokemon,
    'connected' => $connected,
    'homeSession' => $homeSession,
]);