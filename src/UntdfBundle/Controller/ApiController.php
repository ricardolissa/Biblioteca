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
        
        $cre=$request->query->get('busqueda');
        $em = $this->getDoctrine()->getManager();
        $librosRepo = $em->getRepository('UntdfBundle:Libro');
                 
        $qb = $librosRepo->createQueryBuilder('lib');

        // if(isset($cre['isbn'])) {
        //         $qb->Where('lib.isbn = :isbn')
        //         ->setparameter ('isbn', $cre['isbn']); 
        //     }

        if(isset($cre)) {
                $qb->andWhere(
                        $qb->expr()->like('lib.nombre', ':nombre')
                )
                ->setparameter ('nombre','%'.$cre.'%'); 
            
            } 

        $libros = $qb->getQuery()->getResult();




        $view = $this->view($libros,200);
        return $this->handleView($view);
        
    }
}