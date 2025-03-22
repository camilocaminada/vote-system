<?php

namespace App\Services;

use App\Models\Voter;
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
    public function createVoter(array $data): Voter
    {
        try {
            return $this->voterRepository->create(
                name: $data['name'],
                lastName: $data['lastName'],
                document: $data['document'],
                dob: $data['dob'],
                is_candidate: $data['is_candidate'] ?? null
            );
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
