<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserInfoControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
    }

    public function testIndex(): void
    {
        $this->client->request('GET', '/api/users');

        $this->assertResponseIsSuccessful();
        $response = $this->client->getResponse();

        $this->assertNotFalse($response->getContent());
        $this->assertJsonStringEqualsJsonString('[]', $response->getContent());
    }
}
