<?php

namespace test\unit\models;

use models\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideClient
     */
    public function testCreateClient($name, $mail, $password)
    {
        $client = new Client($name, $mail, $password);
        $this->assertSame($name, $client->getName());
        $this->assertSame($mail, $client->getEmail());
        $this->assertSame($password, $client->getPassword());

    }

    public function provideClient()
    {
        return array(
            array('GUTH', 'a.g@gmail.com', 'password'),
            array('GROSDIDIER', 'f.g@gmail.com', 'tothemoon'),
            array('DOE', 'john.doe@wanadoo.com', 'whichIwasJohnWick')
        );
    }
}
