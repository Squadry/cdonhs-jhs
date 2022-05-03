<?php
require('vendor/autoload.php');

use Dcblogdev\PdoWrapper\Database;

$options = [
    'host' => "localhost",
    'database' => "lms",
    'username' => "root",
    'password' => ""
];
$lms = new Database($options);

$dir = "./";
