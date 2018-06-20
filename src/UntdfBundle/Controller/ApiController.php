<?php

namespace UntdfBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Prefix;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Prefix("/api/")
 */
class ApiController extends FOSRestController
{
    /**
     * @Route("libros")
     */
    public function getLibrosAction(Request $request)
    {
        

        $em = $this->getDoctrine()->getManager();
        $libros = $em->getRepository('UntdfBundle:Libro')->findAll();
        $view = $this->view($libros,200);
        return $this->handleView($view);
        
    }
}