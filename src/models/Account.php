<?php

namespace models;
class Account
{
    private $accountId;
    private $wording;
    private $balance;
    private $overdraft;
    private $clientId;

    /**
     * @param $accountId
     * @param $wording
     * @param $balance
     * @param $overdraft
     * @param $clientId
     */
    public function __construct($accountId, $wording, $balance, $overdraft, $clientId)
    {
        $this->accountId = $accountId;
        $this->wording = $wording;
        $this->balance = $balance;
        $this->overdraft = $overdraft;
        $this->clientId = $clientId;
    }


    public function getAccountId()
    {
        return $this->accountId;
    }


    public function getWording()
    {
        return $this->wording;
    }


    public function getBalance()
    {
        return $this->balance;
    }


    public function getOverdraft()
    {
        return $this->overdraft;
    }


    public function getClientId()
    {
        return $this->clientId;
    }

}