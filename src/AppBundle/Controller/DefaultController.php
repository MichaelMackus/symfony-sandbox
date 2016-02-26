<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Data\MyValueObject;
use AppBundle\Form\MyChoiceType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $default = new MyValueObject('object 1');

        $form = $this->createFormBuilder(['vo' => $default])
            ->add('vo', MyChoiceType::class)
            ->add('submit', 'submit')
            ->getForm()
        ;

        ($request->isMethod('post') && $form->handleRequest($request));

        $result = $form->getData();

        return $this->render('AppBundle::index.html.twig', ['form' => $form->createView(), 'result' => $result]);
    }
}
