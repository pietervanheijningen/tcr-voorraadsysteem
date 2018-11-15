<?php

use Symfony\Component\Dotenv\Dotenv;

define('PROJECT_ROOT', __DIR__);

$dotenv = new Dotenv();

$dotenv->load(PROJECT_ROOT . '/.env');
