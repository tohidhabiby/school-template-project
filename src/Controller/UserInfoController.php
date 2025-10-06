<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserInfoController extends AbstractController
{
    #[Route('/api/users', name: 'api_users')]
    public function index(): JsonResponse
    {
        return $this->json([]);
    }
}
