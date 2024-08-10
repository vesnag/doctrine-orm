<?php

/**
 * @file
 * bootstrap.php
 */

error_reporting(E_ALL & ~E_DEPRECATED);

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes.
$config = ORMSetup::createAttributeMetadataConfiguration(
paths: [__DIR__ . "/src"],
isDevMode: true,
);

// Configuring the database connection.
$connection = DriverManager::getConnection([
  'driver' => 'pdo_sqlite',
  'path' => __DIR__ . '/db.sqlite',
], $config);

// Obtaining the entity manager.
$entityManager = new EntityManager($connection, $config);
