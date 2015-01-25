<?php

require __DIR__ . '/_header.php';


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use \Cartman\Init\Pokemon\Model\PokemonModel;

$pokemonRepository = $em->getRepository('Cartman\Init\Pokemon\Model\PokemonModel');

$userRepository = $em->getRepository('Cartman\Init\Trainer\Model\TrainerModel');

/** @var PokemonModel $stricker */
$stricker  = $pokemonRepository->findOneBy(array('user_id' => $_SESSION['id']));
$user = $userRepository->findAll();

$pokemons = $pokemonRepository->findAll();
shuffle($pokemons);

/** @var PokemonModel $goal */
$goal = array_pop($pokemons);

if(strtotime('now') - $user->getLastBattle() < 3600*6){
    echo 'fail';
} else {

    $attack = mt_rand(10, 20);
    if (true === $stricker->isTypeWeak($goal->getType()))
        $attack = ceil($attack / 2);

    if (true === $stricker->isTypeStrong($goal->getType()))
        $attack = ceil($attack * 2);

    $goal->removeHP((int)$attack);
    $user->getLastBattle(strtotime('now'));
    $em->persist($goal, $user);
    $em->flush();
}

$connected= $_SESSION['connected'];
$homeSession = $_SESSION;

echo $twig->render('attack.html.twig', [
    'stricker'=> $stricker,
    'goal' => $goal,
    'connected' => $connected,
    'homeSession' => $homeSession,
]);
