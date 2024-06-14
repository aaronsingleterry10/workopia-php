<?php

namespace App\Controllers;

use Framework\Database;

class ListingController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show all listings
     * 
     * @return void 
     */

    public function index()
    {

        $listings = $this->db->query('select * from listings')->fetchAll();
        loadView('listings/index', [
            'listings' => $listings
        ]);
    }

    /**
     * Show the create listing form
     * 
     * @return void 
     */

    public function create()
    {
        loadView('listings/create');
    }

    /**
     * Show single listing
     * 
     * @return void 
     */

    public function show($params)
    {
        $id = $params['id'];

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('select * from listings where id = :id', $params)->fetch();

        // Check if listing exists
        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('/listings/show', [
            'listing' => $listing
        ]);
    }
}