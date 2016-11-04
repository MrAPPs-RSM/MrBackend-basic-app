<?php


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function testTrue()
    {
        $this->assertTrue(true);
    }

    public function testPublicUrl()
    {
        $client = static::createClient();

        $client->request('GET', '/test/public_url');

        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
    }
}
