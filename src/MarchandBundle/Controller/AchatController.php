<?php

namespace MarchandBundle\Controller;

use MarchandBundle\Entity\Achat;
use MarchandBundle\Entity\User;
use MarchandBundle\Entity\Fruit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Achat controller.
 *
 */
class AchatController extends Controller
{

    /**
     * Actions Client
     *
     */



    /**
     * Lists all achat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $achats = $em->getRepository('MarchandBundle:Achat')->findBy(array('client'=>$user));

        return $this->render('MarchandBundle:Achat:index.html.twig', array(
            'achats' => $achats,
        ));
    }

    /**
     * Creates a new achat entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $fruits = $em->getRepository('MarchandBundle:Fruit')->findAll();

        $achat = new Achat();
        $form = $this->createForm('MarchandBundle\Form\AchatType', $achat);
        $form->handleRequest($request);
        $user = $this->get('security.context')->getToken()->getUser();
        $quantite = $form->get('quantite')->getData();
        $fruitID = $form->get('fruit')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $fruit = $em->getRepository('MarchandBundle:Fruit')->findOneBy(array('id'=>$fruitID));
            $prix = $fruit->getPrix();
            $achat->setClient($user);
            $achat->setTotal($prix * $quantite);

            $em = $this->getDoctrine()->getManager();
            $em->persist($achat);
            $em->flush($achat);

            return $this->redirectToRoute('achat_show', array('id' => $achat->getId()));
        }

        return $this->render('MarchandBundle:Achat:new.html.twig', array(
            'achat' => $achat,
            'fruits' => $fruits,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a achat entity.
     *
     */
    public function showAction(Achat $achat)
    {
        $deleteForm = $this->createDeleteForm($achat);

        return $this->render('MarchandBundle:Achat:show.html.twig', array(
            'achat' => $achat,
            'delete_form' => $deleteForm->createView(),
        ));
    }





    /**
     * Actions Marchand
     *
     */



    /**
     * Displays a form to edit an existing achat entity.
     *
     */
    public function editAction(Request $request, Achat $achat)
    {
        $deleteForm = $this->createDeleteForm($achat);
        $editForm = $this->createForm('MarchandBundle\Form\AchatMarchandType', $achat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('achat_edit', array('id' => $achat->getId()));
        }

        return $this->render('MarchandBundle:Achat:edit.html.twig', array(
            'achat' => $achat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a achat entity.
     *
     */
    public function deleteAction(Request $request, Achat $achat)
    {
        $form = $this->createDeleteForm($achat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($achat);
            $em->flush($achat);
        }

        return $this->redirectToRoute('achat_index_marchand');
    }

    /**
     * Creates a form to delete a achat entity.
     *
     * @param Achat $achat The achat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Achat $achat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('achat_delete', array('id' => $achat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function indexMarchandAction()
    {
        $em = $this->getDoctrine()->getManager();
        $achats = $em->getRepository('MarchandBundle:Achat')->findAll();
        $users = $em->getRepository('MarchandBundle:User')->findAll();
        $fruits = $em->getRepository('MarchandBundle:Fruit')->findAll();

        return $this->render('MarchandBundle:Achat:indexMarchand.html.twig', array(
            'achats' => $achats,
            'users' => $users,
            'fruits' => $fruits,
        ));
    }

    public function newMarchandAction(Request $request)
    {
        $achat = new Achat();
        $form = $this->createForm('MarchandBundle\Form\AchatMarchandType', $achat);
        $form->handleRequest($request);
        $quantite = $form->get('quantite')->getData();
        $fruitID = $form->get('fruit')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $fruit = $em->getRepository('MarchandBundle:Fruit')->findOneBy(array('id'=>$fruitID));
            $prix = $fruit->getPrix();
            $achat->setTotal($prix * $quantite);

            $em->persist($achat);
            $em->flush($achat);

            return $this->redirectToRoute('achat_show_marchand', array('id' => $achat->getId()));
        }

        return $this->render('MarchandBundle:Achat:newMarchand.html.twig', array(
            'achat' => $achat,
            'form' => $form->createView(),
        ));
    }

    public function showMarchandAction(Achat $achat)
    {
        $deleteForm = $this->createDeleteForm($achat);

        return $this->render('MarchandBundle:Achat:showMarchand.html.twig', array(
            'achat' => $achat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function newUserAction(Request $request)
    {

        $user = new User();
        $form = $this->createForm('MarchandBundle\Form\UserType', $user);
        $form->handleRequest($request);
        $username = $form->get('username')->getData();
        $email = $form->get('email')->getData();
        $password = $form->get('password')->getData();

        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail($email);
        $user->addRole('ROLE_USER');
        $user->setEnabled(1);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush($user);

            return $this->redirectToRoute('achat_index_marchand');
        }

        return $this->render('MarchandBundle:Achat:newUser.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    public function userDeleteAction(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MarchandBundle:User')->findOneBy(array('id'=>$user));
        $em->remove($user);
        $em->flush($user);
        return $this->redirectToRoute('marchand_users');
    }


}
