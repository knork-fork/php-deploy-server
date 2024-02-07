<?php
declare(strict_types=1);

namespace App\Controller\Test;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class TestController extends AbstractController
{
    public function test(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Test/TestController.php',
        ]);
    }
}
