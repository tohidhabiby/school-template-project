<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserInfoControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/users');

        $this->assertResponseIsSuccessful();
        $response = $client->getResponse();

        $this->assertNotFalse($response->getContent());
        $this->assertJsonStringEqualsJsonString('[]', $response->getContent());
    }
}
