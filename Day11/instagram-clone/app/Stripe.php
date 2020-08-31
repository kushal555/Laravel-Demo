<?php


namespace App;


class Stripe
{

    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

}
