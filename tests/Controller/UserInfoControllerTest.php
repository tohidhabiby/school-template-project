<?php

namespace App\Tests\Controller;

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserInfoControllerTest extends WebTestCase
{
    protected static function createKernel(array $options = []): Kernel
    {
        return new Kernel('test', true);
    }

    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/users');

        $this->assertResponseIsSuccessful();
        $response = $client->getResponse();

        $this->assertNotFalse($response->getContent());
        $this->assertJsonStringEqualsJsonString('[]', $response->getContent());
    }
