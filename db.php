<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo $_ENV['DB_HOST'] . "\n";
echo $_SERVER['DB_USER'] . "\n";
