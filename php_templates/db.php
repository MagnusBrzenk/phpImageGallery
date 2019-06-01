<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
$LOCAL_DB_USERNAME = getenv('LOCAL_DB_USERNAME');
$LOCAL_DB_PASSWORD = getenv('LOCAL_DB_PASSWORD');
$LOCAL_DB_NAME = getenv('LOCAL_DB_NAME');
$connection = mysqli_connect('localhost',  $LOCAL_DB_USERNAME, $LOCAL_DB_PASSWORD, $LOCAL_DB_NAME);
