<?php

require __DIR__ . '/_header.php';

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use \Cartman\Init\Trainer\Model;

$user = new Model\TrainerModel();

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new Model\TrainerModel();
    $user
        ->setusername($username)
        ->setpassword($password)
    ;

    $em->persist($user);
    $em->flush();
    echo 'Trainer created!';
}

echo $twig->render('signIn.html.twig', [
    'user' => $user,
]);

