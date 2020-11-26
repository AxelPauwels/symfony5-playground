<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{

    // methods="POST"   will only allow POST requests
    // <\d+>            will only allow 'id' to be a decimal
    // <up\down>        will only allow 'direction' to be "up" or "down"
    /**
     * @Route("/comments/{id<\d+>}/vote/{direction<up\down>}", methods="POST")
     */
    public function commentVote($id, $direction)
    {
        //todo use id to query db

        if ($direction === 'up') {
            $currentVoteCount = rand(7, 100);
        } else {
            $currentVoteCount = random_int(0, 5);
        }

        // -> Returns with Content-Type: application/json
        // return new JsonResponse(['votes' => $currentVoteCount]);

        return $this->json(['votes' => $currentVoteCount]);
    }
}