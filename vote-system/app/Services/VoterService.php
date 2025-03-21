<?php

namespace App\Services;

use App\Repositories\VoterRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class VoterService
{
    protected VoterRepository $voterRepository;

    public function __construct(VoterRepository $voterRepository)
    {
        $this->voterRepository = $voterRepository;
    }

    /**
     * @throws Exception
     */
    public function createVoter(array $data)
    {
        try {
            return $this->voterRepository->create($data);
        } catch (Exception) {
            throw new Exception('Could not create voter');
        }
    }

    public function listCandidates(?bool $withVotes = false): Collection
    {
        if ($withVotes) {
            return $this->voterRepository->getCandidatesWithVotes();
        }
        return $this->voterRepository->getCandidates();
    }
}
