<?php

/*session_start();*/
require __DIR__ . '/_header.php';
/**
 * Protection
 */
/*if (empty($_SESSION['connected'])) {
    echo 'Forbidden !';
    die;
}*/
/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';
use Cartman\Init\Trainer\Model\TrainerModel;
$username = !empty($_POST['username']) ? $_POST['username'] : null;
$password = !empty($_POST['password']) ? $_POST['password'] : null;

/**
 * Login
 */
if (null !== $username && null !== $password) {
    /** @var \Doctrine\ORM\EntityRepository $userRepository */
    $userRepository = $em->getRepository('Cartman\Init\Trainer\Model\TrainerModel');
    /** @var TrainerModel|null $user */
    $user = $userRepository->findOneBy([
        'username' => $username,
        'password' => $password,
    ]);
    if (null !== $user) {
        $_SESSION['id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['connected'] = true;
    }
    if ($_SESSION['connected'] = true)
        header('location: index.php');
}

echo $twig->render('login.html.twig', [

]);


