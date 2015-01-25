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

/** @var PokemonModel $pokemon */
$pokemon  = $pokemonRepository->findOneBy(array('user_id' => $_SESSION['id']));

/** @var TrainerModel $user */
$user = $userRepository->find($_SESSION['id']);

$lastRevive = $user->getLastRevive();
$time = strtotime("now");
if($time - $lastRevive <= (3600*24))
{
    header("location: error-2.php");
}

$hp = $pokemon->getHP() ;

if($hp > 0)
    header('Location: wait.php');
else{
    $pokemon->setHP(100);
    $user->setLastRevive($time);
    $em->persist($pokemon, $user);
    $em->flush();
    header('Location: index.php');
}
