<?php

$bundles = [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
];

if (class_exists(Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class)) {
    $bundles[Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class] = ['dev' => true, 'stage' => true, 'test' => true];
}

if (class_exists(Nelmio\ApiDocBundle\NelmioApiDocBundle::class)) {
    $bundles[Nelmio\ApiDocBundle\NelmioApiDocBundle::class] = ['dev' => true, 'stage' => true];
}

return $bundles;
