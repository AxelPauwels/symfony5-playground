<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use App\Service\MarkdownHelper;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Sentry\State\HubInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    private $logger;
    private $isDebug;

    public function __construct(LoggerInterface $logger, bool $isDebug)
    {
        $this->logger = $logger;
        $this->isDebug = $isDebug;
    }

    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage(QuestionRepository $questionRepository)
    {
        $questions = $questionRepository->findAllAskedOrderedByNewest();

        // the "return $this->render" at the bottom just uses symfony 'Services'..."Objects that do something.."
        // it replaces this:
        // $html = $twigEnvironment->render('question/homepage.html.twig');
        // return new Response($html);

        return $this->render('question/homepage.html.twig',[
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/questions/new")
     */
    public function new(EntityManagerInterface $entityManager)
    {
        return new Response('This is todo in feature V2');
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     * @return Response
     */
    public function show(Question $question)
    {
//        dump($this->getParameter('cache_adapter'));
//        throw new \Exception('Bad stuff happened');
//        dump($sentryHub);

        if ($this->isDebug) {
            $this->logger->info('We are in debug mode');
        }

        if (!$question) {
            throw $this->createNotFoundException(sprintf('no question found for slug "%s"', $slug));
        }

        $answers = [
            'Make sure your cat is sitting `purrrfectly` still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        return $this->render('question/show.html.twig', [
            'question' => $question,
            'answers' => $answers
        ]);
    }

    /**
     * @Route("/questions/{slug}/vote", name="app_question_vote", methods="POST")
     */
    public function questionVote(Question $question, Request $request, EntityManagerInterface $entityManager)
    {
        $direction = $request->request->get('direction');

        if ($direction === 'up') {
            $question->upVote();
        } elseif ($direction === 'down') {
            $question->downVote();
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_question_show',[
            'slug' => $question->getSlug(),
        ]);
    }
}