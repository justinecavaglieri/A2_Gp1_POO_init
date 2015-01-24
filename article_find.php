<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $articleRepository */
$articleRepository = $em->getRepository('Cartman\Init\Article');

$article = $articleRepository->find(1);
$articles = $articleRepository->findAll();

var_dump($articles);

