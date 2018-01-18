<?php
use \Doctrine\ORM\EntityManager;

$container = require 'config/container.php';

return new \Symfony\Component\Console\Helper\HelperSet([
  'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper(
    $container->get(EntityManager::class)
  ),
  'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper(
    $container->get(EntityManager::class)->getConnection()
  ),
  'dialog' => new \Symfony\Component\Console\Helper\QuestionHelper(),
]);