<?php

namespace App\Services;

use App\Models\Voter;
use App\Repositories\VoteRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class VoteService
{
    protected VoteRepository $voteRepository;

    public function __construct(VoteRepository $voteRepository)
    {
        $this->voteRepository = $voteRepository;
    }

    /**
     * @throws Exception
     */
    public function registerVote(string $document, int $candidateId): bool
    {
        $voter = Voter::where('document', $document)->firstOrFail();

        if ($this->voteRepository->hasVoted($voter->id)) {
            throw new Exception("This voter has already voted");
        }

        $this->voteRepository->createVote($voter->id, $candidateId);

        return true;
    }

    public function list(): Collection
    {
        return $this->voteRepository->list();
    }

}
