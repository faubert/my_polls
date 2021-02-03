<?php

namespace App\Controller;

use App\Entity\Polls;
use App\Form\PollFormType;
use App\Repository\PollsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PollController extends AbstractController
{
    /**
     * @Route("/polls", name="poll_list")
     */
    public function index(): Response
    {
        $entityRepository = $this->getDoctrine()->getRepository(Polls::class);
        $polls = $entityRepository->findAll();

        return $this->render('poll/index.html.twig', [
            'polls' => $polls
        ]);
    }

    public function createPoll(Request $request)
    {
        $poll = new Polls();
        $form = $this->createForm(PollFormType::class, $poll);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $poll = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($poll);
            $em->flush();

            return $this->redirectToRoute('poll_list');
        }
    }

    /**
     * @Route("/polls/add", name="poll_add")
     */
    public function add()
    {

    }

    /**
     * @Route("/polls/edit/{id}", name="poll_edit")
     */
    public function edit($id)
    {

    }
}
