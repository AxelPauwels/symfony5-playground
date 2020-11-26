<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{

    // methods="POST"   will only allow POST requests
    // <\d+>            will only allow 'id' to be a decimal
    // <up|down>        will only allow 'direction' to be "up" or "down"
    /**
     * @Route("/comments/{id<\d+>}/vote/{direction<up|down>}", methods="POST")
     * @param $id
     * @param $direction
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function commentVote($id, $direction, LoggerInterface $logger):JsonResponse
    {
        //todo use id to query db

        if ($direction === 'up') {
            $logger->info('Voting up!');
            $currentVoteCount = rand(7, 100);
        } else {
            $currentVoteCount = rand(0, 5);
            $logger->info('Voting down!');
        }

        // -> Returns with Content-Type: application/json
        // return new JsonResponse(['votes' => $currentVoteCount]);

        return $this->json(['votes' => $currentVoteCount]);
    }
}