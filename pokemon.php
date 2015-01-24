<?php

require __DIR__.'/vendor/autoload.php';


use \Cartman\Init\Pokemon\Model\PokemonModel;

$pokemonRepository = $em->getRepository('Cartman\Init\Pokemon\Model\PokemonModel');

/** @var PokemonModel $stricker */
$striker = $pokemonRepository->findOneBy(array('user_id' => $_SESSION['id']));

$pokemons =$pokemonRepository->findAll();
shuffle($pokemons);

/** @var PokemonModel $goal */
$goal = array_pop($pokemons);

/**
 * Parameters
 */
$matchover = false;
$i=1;

echo $stricker->getUsername().' VS '.$goal->getUsername().'</br>';
while (false === $matchover) {
    echo '</br>round '.$i.'</br>';

    $na = mt_rand(1, 3);
    for ($j = 0 ; $j < $na; $j++) {
        $attack = mt_rand(5, 20);
        if (true === $stricker->isTypeWeak($goal->getType()))
            $attack = ceil($attack / 2);

        if (true === $stricker->isTypeStrong($goal->getType()))
            $attack = ceil($attack * 2);

        $goal->removeHP((int)$attack);
        echo $goal->getUsername().' loses '.$attack.' HP, '.$goal->getHP().' left him </br>';
    }
    if (0 === $goal->getHP()){
        $matchover = true;
    }
    if (false === $matchover)
        list($stricker, $goal) = [$goal, $stricker];

    $i++;
}
echo '</br>'.$stricker->getUsername().' win! '.$stricker->getHP().' HP left him.';


