<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use Cartman\Init\Article;
use Cocur\Slugify\Slugify;

$article = new Article();
$slugify = new Slugify();

$article
    ->setTitle('dfsdh fgh')
    ->setSlug($slugify->slugify('dfgh drftgh'))
    ->setStatus(Article::STATUS_VALIDATED)
;

$em->persist($article);
$em->flush();

