<?php

namespace UntdfBundle\Controller;

use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UntdfBundle\Entity\Idioma;

/**
 * Idioma controller.
 *
 * @Route("admin/idioma")
 */
class IdiomaController extends Controller
{
    /**
     * Lists all idioma entities.
     *
     * @Route("/", name="idioma_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $idiomas = $em->getRepository('UntdfBundle:Idioma')->findAll();

        return $this->render('@Untdf/Idiomas/index.html.twig', array(
            'idiomas' => $idiomas,
        ));
    
    }

    /**
     * Creates a new idioma entity.
     *
     * @Route("/new", name="idioma_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $idioma = new Idioma();
        $form = $this->createForm('UntdfBundle\Form\IdiomaType', $idioma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($idioma);
            $em->flush();
            
            $this->addFlash(
                'new', 'Se creo el nuevo Idioma con exito'
            );
            
            return $this->redirectToRoute('idioma_show', array('id' => $idioma->getId()));
        }

        return $this->render('@Untdf/Idiomas/new.html.twig', array(
            'idioma' => $idioma,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a idioma entity.
     *
     * @Route("/{id}", name="idioma_show")
     * @Method("GET")
     */
    public function showAction(Idioma $idioma)
    {
        $deleteForm = $this->createDeleteForm($idioma);

        return $this->render('@Untdf/Idiomas/show.html.twig', array(
            'idioma' => $idioma,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing idioma entity.
     *
     * @Route("/{id}/edit", name="idioma_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Idioma $idioma)
    {
        $deleteForm = $this->createDeleteForm($idioma);
        $editForm = $this->createForm('UntdfBundle\Form\IdiomaType', $idioma);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

             $this->addFlash(
                'edit', 'Se modifico el Idioma con exito'
            );
            return $this->redirectToRoute('idioma_edit', array('id' => $idioma->getId()));
        }

        return $this->render('@Untdf/Idiomas/edit.html.twig', array(
            'idioma' => $idioma,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a idioma entity.
     *
     * @Route("/{id}", name="idioma_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Idioma $idioma)
    {
        $form = $this->createDeleteForm($idioma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        try {
              $em = $this->getDoctrine()->getManager();
            $em->remove($idioma);
            $em->flush();
            

             $this->addFlash(
                'delete', 'Se elimino el Idioma'
            );
        } catch (ForeignKeyConstraintViolationException $e) {
            die("no se puede cambiar el idioma");
        }

          
        }

        return $this->redirectToRoute('idioma_index');
    }

    /**
     * Creates a form to delete a idioma entity.
     *
     * @param Idioma $idioma The idioma entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Idioma $idioma)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('idioma_delete', array('id' => $idioma->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
