<?php

namespace UntdfBundle\Controller;

use UntdfBundle\Entity\Libro;
use UntdfBundle\Form\LibroSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * front controller.
 *
 * @Route("/")
 */
class FrontController extends Controller
{
    /**
     * 
     *
     * @Route("/", name="home")
     * @Method({"GET","POST"})
     */
    public function indexAction(Request $request)
    {
        
        $form = $this->createForm(LibroSearchType::class);
         
        $em = $this->getDoctrine()->getManager();

        $librosR = $em->getRepository('UntdfBundle:Libro');
        

        /*** locale  trae el valor por defecto * 
        $locale= $request->getLocale();
        print_r($locale);
        /*** llama al traductor segun la variable por defecto*** 
        $translated = $this->get('translator')->trans('Hello how are you?');
        
        $t = $this->get('translator')->trans('Hello %name% how are you?', array('%name%'=>$name));
        die($t);
*/
        /***/
        $name = 'MARTIN';


        $qb = $librosR ->createQueryBuilder('lib');
        $form ->handleRequest($request);

        if($form-> isValid()) {
            $cre = $form->getData();

            if(isset($cre['isbn'])) {
                $qb->andWhere('lib.isbn = :isbn')
                ->setparameter ('isbn', $cre['isbn']); 
            }

            if(isset($cre['buscar'])) {
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->like('lib.nombre', ':nombre')
                    )
                )
                ->setparameter ('nombre','%'.$cre['buscar'].'%'); 
                
            }
             if(isset($cre['idioma'])) {
                $qb->andWhere('lib.idioma = :idioma')
                ->setparameter ('idioma', $cre['idioma']); 
            }
            
            if(isset($cre['categorias'])&& !$cre['categorias']->isEmpty()) {
                $qb->innerJoin('lib.categorias', 'cat')
                    ->andWhere($qb->expr()->in('cat', ':categorias'))
                ->setparameter ('categorias', $cre['categorias']);

            }

            if(isset($cre['autores'])) {
                $qb->innerJoin('lib.autores', 'aut')
                    ->andWhere($qb->expr()->in('aut', ':autores'))
                ->setparameter ('autores', $cre['autores']);

            }
        }

        $query = $qb->getQuery();




        return $this->render('default/index.html.twig', ['form' => $form->createView(), 'libros' => $query->getResult(), 'name'=>$name]);
    
    }

    
}
