<?php

require __DIR__ . '/_header.php';

if (empty($_SESSION['connected']))
    header("Location: login.php");

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use \Cartman\Init\Pokemon\Model\PokemonModel;
use \Cartman\Init\Trainer\Model\TrainerModel;

/** @var  \Doctrine\ORM\EntityRepository $pokemonRepository */
$pokemonRepository = $em->getRepository('Cartman\Init\Pokemon\Model\PokemonModel');

/** @var \Doctrine\ORM\EntityRepository $userRepository */
$userRepository = $em->getRepository('Cartman\Init\Trainer\Model\TrainerModel');

/** @var PokemonModel $stricker */
$stricker  = $pokemonRepository->findOneBy(array('user_id' => $_SESSION['id']));

/** @var TrainerModel $user */
$user = $userRepository->find($_SESSION['id']);

$pokemons = $pokemonRepository->findAll();
shuffle($pokemons);

/** @var PokemonModel $goal */
$goal = array_pop($pokemons);

/**
 * Time
 */
$lastBattle = $user->getLastBattle();
$time = strtotime("now");
if($time - $lastBattle <= (3600*6))
{
    header("location: error-1.php");
}

    $attack = mt_rand(10, 20);
    if (true === $stricker->isTypeWeak($goal->getType()))
        $attack = ceil($attack / 2);

    if (true === $stricker->isTypeStrong($goal->getType()))
        $attack = ceil($attack * 2);

    $goal->removeHP((int)$attack);
    $user->setLastBattle($time);
    $em->persist($goal, $user);
    $em->flush();


$connected= $_SESSION['connected'];
$homeSession = $_SESSION;

echo $twig->render('attack.html.twig', [
    'stricker'=> $stricker,
    'goal' => $goal,
    'connected' => $connected,
    'homeSession' => $homeSession,
]);
