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
        $this->markTestSkipped();
        $client = static::createClient();

        $client->request('GET', '/test/public_url/1');

        $content = $client->getResponse()->getContent();

        $expectedResponse = json_encode([
            "url" => "http://localhost/ciao",
        ]);

        $this->assertEquals(
            $expectedResponse,
            $content
        );
    }
}
