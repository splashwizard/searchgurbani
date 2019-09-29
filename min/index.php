<?php
// template file for creating your own Minify endpoint

// adjust this path as necessary
require __DIR__ . '/../application/vendor/autoload.php';

$app = new \Minify\App(__DIR__);
$app->runServer();
