<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BoletinSalida;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Boletinsalida controller.
 *
 * @Route("boletinsalida")
 */
class BoletinSalidaController extends Controller
{
    /**
     * Lists all boletinSalida entities.
     *
     * @Route("/", name="boletinsalida_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boletinSalidas = $em->getRepository('AppBundle:BoletinSalida')->findAll();
        return $this->render('boletinsalida/index.html.twig', array(
            'boletinSalidas' => $boletinSalidas,
        ));
    }

    /**
     * Creates a new boletinSalida entity.
     *
     * @Route("/new", name="boletinsalida_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $boletinSalida = new Boletinsalida();
        $form = $this->createForm('AppBundle\Form\BoletinSalidaType', $boletinSalida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($boletinSalida);
            $em->flush();
            return $this->redirectToRoute('boletinsalida_index');
        }

        return $this->render('boletinsalida/new.html.twig', array(
            'boletinSalida' => $boletinSalida,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a boletinSalida entity.
     *
     * @Route("/{id}", name="boletinsalida_show")
     * @Method("GET")
     */
    public function showAction(BoletinSalida $boletinSalida)
    {
        $deleteForm = $this->createDeleteForm($boletinSalida);

        return $this->render('boletinsalida/show.html.twig', array(
            'boletinSalida' => $boletinSalida,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing boletinSalida entity.
     *
     * @Route("/{id}/edit", name="boletinsalida_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BoletinSalida $boletinSalida)
    {
        $deleteForm = $this->createDeleteForm($boletinSalida);
        $editForm = $this->createForm('AppBundle\Form\BoletinSalidaType', $boletinSalida);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boletinsalida_show', array('id' => $boletinSalida->getId()));
        }

        return $this->render('boletinsalida/edit.html.twig', array(
            'boletinSalida' => $boletinSalida,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a boletinSalida entity.
     *
     * @Route("/{id}", name="boletinsalida_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BoletinSalida $boletinSalida)
    {
        $form = $this->createDeleteForm($boletinSalida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($boletinSalida);
            $em->flush();
        }

        return $this->redirectToRoute('boletinsalida_index');
    }

    /**
     * Creates a form to delete a boletinSalida entity.
     *
     * @param BoletinSalida $boletinSalida The boletinSalida entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BoletinSalida $boletinSalida)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boletinsalida_delete', array('id' => $boletinSalida->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
