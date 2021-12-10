<?php

namespace adapter;

use models\Client;

class ClientAdapter
{
    private $itemToAdapt;
    private $clientDao;

    public function __construct($itemToAdapt, $clientDao)
    {
        $this->clientDao = $clientDao;
        $this->itemToAdapt = $itemToAdapt;
    }

    public function returnObject()
    {
        $objectToReturn = [];

        if (isset($this->itemToAdapt)) {
            foreach ($this->itemToAdapt as $key => $singleItem) {
                $objectToReturn [] = new Client(
                    $singleItem['id'],
                    $singleItem['name'],
                    $singleItem['email'],
                    $singleItem['password']
                );
            };
        }

        return $objectToReturn;
    }
}