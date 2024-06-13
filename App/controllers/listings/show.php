<?php

use Framework\Database;

$config = require basePath('config/db.php');
$db = new Database($config);

// GET id from the query from URL
$id = $_GET['id'] ?? '';

$params = [
    'id' => $id
];

$listing = $db->query('select * from listings where id = :id', $params)->fetch();

loadView('/listings/show', [
    'listing' => $listing
]);