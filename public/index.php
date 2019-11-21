<?php

use duncan3dc\Laravel\BladeInstance;
use InterTree\Entities\Category;
use InterTree\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$blade = new BladeInstance(__DIR__ . '/../resources/views', __DIR__ . '/../.cache/views');

try {
    $entityManagerFactory = new EntityManagerFactory();
    $entityManager = $entityManagerFactory->getEntityManager();

    $query = $entityManager->createQuery('SELECT u FROM InterTree\Entities\Category u WHERE u.parent IS NULL');

    /**
     * Fetched categories
     * @var Category[] $categories
     */
    $categories = $query->getResult();

    echo $blade->render('app', [
        'categories' => $categories,
    ]);
} catch (Exception $e) {
    echo $blade->render('error', [
        'title' => 'Internal server error',
        'description' => 'Failed to create database connection',
        'code' => 500,
        'message' => $e->getMessage(),
    ]);
    http_response_code(500);
}
