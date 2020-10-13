<?php 
require realpath(__DIR__.'autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."");
$dotenv->load();