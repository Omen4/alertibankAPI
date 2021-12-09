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

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @return mixed
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @return mixed
     */
    public function getOverdraft()
    {
        return $this->overdraft;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }


}