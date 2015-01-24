<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $articleRepository */
$articleRepository = $em->getRepository('Cartman\Init\Article');

/** @var \Cartman\Init\Article $article */
$article = $articleRepository->find(!empty($_GET['id']) ? $_GET['id'] : 1);

if (null !== $article)
$em->remove($article);

$em->flush();

