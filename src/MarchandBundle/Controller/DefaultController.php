<?php

namespace MarchandBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        if ($this->isGranted('ROLE_ADMIN')){
            return $this->redirectToRoute('achat_index_marchand');
        } elseif ($this->isGranted('ROLE_USER')){
            return $this->redirectToRoute('achat_index');
        }

        return $this->render('MarchandBundle:Default:index.html.twig');
    }
}
