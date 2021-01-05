<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Boletin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Boletin controller.
 *
 * @Route("boletin")
 */
class BoletinController extends Controller
{
    /**
     * Lists all boletin entities.
     *
     * @Route("/", name="boletin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boletins = $em->getRepository('AppBundle:Boletin')->findAll();

        return $this->render('boletin/index.html.twig', array(
            'boletins' => $boletins,
        ));
    }

    /**
     * Creates a new boletin entity.
     *
     * @Route("/new", name="boletin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $boletin = new Boletin();
        $form = $this->createForm('AppBundle\Form\BoletinType', $boletin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($boletin);
            $em->flush();

            return $this->redirectToRoute('boletin_show', array('id' => $boletin->getId()));
        }

        return $this->render('boletin/new.html.twig', array(
            'boletin' => $boletin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a boletin entity.
     *
     * @Route("/{id}", name="boletin_show")
     * @Method("GET")
     */
    public function showAction(Boletin $boletin)
    {
        $deleteForm = $this->createDeleteForm($boletin);

        return $this->render('boletin/show.html.twig', array(
            'boletin' => $boletin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing boletin entity.
     *
     * @Route("/{id}/edit", name="boletin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Boletin $boletin)
    {
        $deleteForm = $this->createDeleteForm($boletin);
        $editForm = $this->createForm('AppBundle\Form\BoletinType', $boletin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boletin_edit', array('id' => $boletin->getId()));
        }

        return $this->render('boletin/edit.html.twig', array(
            'boletin' => $boletin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a boletin entity.
     *
     * @Route("/{id}", name="boletin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Boletin $boletin)
    {
        $form = $this->createDeleteForm($boletin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($boletin);
            $em->flush();
        }

        return $this->redirectToRoute('boletin_index');
    }

    /**
     * Creates a form to delete a boletin entity.
     *
     * @param Boletin $boletin The boletin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Boletin $boletin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boletin_delete', array('id' => $boletin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
