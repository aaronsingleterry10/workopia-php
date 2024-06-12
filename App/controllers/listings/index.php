<?php

$config = require basePath('config/db.php');
$db = new Database($config);

$listings = $db->query('select * from listings')->fetchAll();

loadView('listings/index', [
    'listings' => $listings
]);