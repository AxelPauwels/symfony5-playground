<?php

declare(strict_types=1);

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage(Environment $twigEnvironment)
    {

        // the "return $this->render" at the bottom just uses symfony 'Services'..."Objects that do something.."
        // it replaces this:
        // $html = $twigEnvironment->render('question/homepage.html.twig');
        // return new Response($html);

        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $answers = [
            'This is answer 1',
            'This is answer 2',
            'This is answer 3'
        ];

        // dd($slug, $this);
        dump($slug, $this);

        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers
        ]);
    }
}