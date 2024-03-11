<?php

// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once 'vendor/autoload.php';

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/Library/Model/Entity'],
    isDevMode: true,
);

// configuring the database connection
$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'library',
    'user' => 'root',
    'password' => '',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);

/**
 * Define o entityManager como constante a ser utilizada em toda a aplicação
 * @var EntityManager $entityManager
 **/
if (!defined('em')) {
    define('em', $entityManager);
}
