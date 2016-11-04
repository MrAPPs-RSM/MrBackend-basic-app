<?php

namespace AppBundle\Controller;

use Mrapps\BackendBundle\Entity\File;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    /**
     * @Route("/public_url")
     */
    public function publicUrlAction(Request $request)
    {
        $file = new File();
        $file->setBucket('erbozeta')
            ->setOriginalName('prova.zip')
            ->setS3Key('/bla/blabla/1234.zip')
            ->setMimeType('application/zip');

        $this->get("mrapps.backend.public_url_provider")
            ->setFileEntity($file)
            ->getUri();

        return new Response("", 200);
    }
}
