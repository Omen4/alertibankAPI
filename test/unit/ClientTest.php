<?php


use models\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @dataProvider provideClient
     */
    public function testCreateClient($name, $mail, $password)
    {
        $client = new Client($name, $mail, $password);
        $this->assertTrue->assertSame($name, $client->getName());
        $this->assertTrue->assertSame($mail, $client->getEmail());
        $this->assertTrue->assertSame($password, $client->getPassword());

    }


    public function provideClientInfo()
    {
        return array(
            array('GUTH', 'a.g@gmail.com', 'password'),
            array('GROSDIDIER', 'f.g@gmail.com', 'tothemoon'),
            array('DOE', 'john.doe@wanadoo.com', 'whichIwasJohnWick')
        );
    }
}
