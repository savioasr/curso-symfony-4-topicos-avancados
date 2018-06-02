<?php

namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;

class PaginasController extends Controller
{  
    /**
     * @Route("/listar")
     */
    public function index()
    {
        return new Response('Bundle');
    }
}