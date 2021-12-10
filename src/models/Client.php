<?php

namespace models;

class Client
{
    private $idClient;
    private $name;
    private $email;
    private $password;
    private $accountList = [];


    public function __construct($idClient, $name, $email, $password)
    {
        $this->idClient = $idClient;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }


    public function getIdClient()
    {
        return $this->idClient;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }

//    public function transferFundToAnotherAccount($amount, $accountNumber){
//        if ($isAuth){
//
//        }
//
//    }

// debiter
// ajouter
}