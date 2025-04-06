<?php

namespace App\Services;

use GuzzleHttp\Client;

class JsonPlaceholderService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchPost()
    {
        $response = $this->client->get('https://jsonplaceholder.typicode.com/posts/1');
        return json_decode($response->getBody(), true);
    }
}
