<?php

namespace UntdfBundle\Controller;

use UntdfBundle\Entity\Categoria;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * categoria controller.
 *
 * @Route("admin/categoria")
 */
class CategoriaController extends Controller
{
    /**
     * Lists all categoria entities.
     *
     * @Route("/", name="categoria_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorias = $em->getRepository('UntdfBundle:Categoria')->findAll();

        return $this->render('@Untdf/Categorias/index.html.twig', array(
            'categorias' => $categorias,
        ));
    }

    /**
     * Creates a new categoria entity.
     *
     * @Route("/new", name="categoria_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categoria = new categoria();
        $form = $this->createForm('UntdfBundle\Form\CategoriaType', $categoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();

            return $this->redirectToRoute('categoria_show', array('id' => $categoria->getId()));
        }

        return $this->render('@Untdf/Categorias/new.html.twig', array(
            'categoria' => $categoria,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categoria entity.
     *
     * @Route("/{id}", name="categoria_show")
     * @Method("GET")
     */
    public function showAction(Categoria $categoria)
    {
        $deleteForm = $this->createDeleteForm($categoria);

        return $this->render('@Untdf/Categorias/show.html.twig', array(
            'categoria' => $categoria,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categoria entity.
     *
     * @Route("/{id}/edit", name="categoria_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Categoria $categoria)
    {
        $deleteForm = $this->createDeleteForm($categoria);
        $editForm = $this->createForm('UntdfBundle\Form\CategoriaType', $categoria);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoria_edit', array('id' => $categoria->getId()));
        }

        return $this->render('@Untdf/Categorias/edit.html.twig', array(
            'categoria' => $categoria,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categoria entity.
     *
     * @Route("/{id}", name="categoria_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Categoria $categoria)
    {
        $form = $this->createDeleteForm($categoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categoria);
            $em->flush();
        }

        return $this->redirectToRoute('categoria_index');
    }

    /**
     * Creates a form to delete a categoria entity.
     *
     * @param Categoria $categoria The categoria entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Categoria $categoria)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoria_delete', array('id' => $categoria->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
