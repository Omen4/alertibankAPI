<?php

namespace models;
class Account
{
    private $accountId;
    private $wording;
    private $balance;
    private $overdraft;
    private $clientId;


    public function __construct($accountId, $wording, $balance, $overdraft, $clientId)
    {
        $this->accountId = (int)$accountId;
        $this->wording = $wording;
        $this->balance = (double)$balance;
        $this->overdraft = (double)$overdraft;
        $this->clientId = (int)$clientId;
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