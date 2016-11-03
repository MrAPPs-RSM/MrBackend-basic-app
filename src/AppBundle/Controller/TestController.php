<?php

namespace AppBundle\Controller;

use Mrapps\BackendBundle\Entity\File;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    /**
     * @Route("/public_url/{file}")
     */
    public function publicUrlAction(Request $request, File $file = null)
    {
        $uri = $this->get("mrapps.backend.public_url_provider")
            ->setFileEntity($file)
            ->getUri();


        return new JsonResponse([
            "url" => $uri,
        ]);
    }
}
