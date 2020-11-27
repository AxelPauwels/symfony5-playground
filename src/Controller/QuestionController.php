<?php

declare(strict_types=1);

namespace App\Controller;


use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
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
    public function show($slug, MarkdownParserInterface $markdownParser)
    {
        $answers = [
            'Make sure your cat is sitting `purrrfectly` still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];
        $questionText = "I've been turned into a cat, any thoughts on how to turn back? While I'm **adorable**, I don't really care for cat food.";
        $parsedQuestionText = $markdownParser->transformMarkdown($questionText);

        // dd($slug, $this);
        // dump($slug, $this);

        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'questionText' => $parsedQuestionText,
            'answers' => $answers
        ]);
    }
}