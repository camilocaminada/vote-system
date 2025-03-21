<?php

namespace App\Repositories;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Collection;

class VoteRepository
{
    public function createVote(int $voterId, int $candidateId) : Vote
    {
        return Vote::create([
            'candidate_voted_id' => $voterId,
            'candidate_id' => $candidateId,
        ]);
    }

    public function hasVoted(int $voterId) : bool
    {
        return Vote::where('candidate_voted_id', $voterId)->exists();
    }

    public function list(): Collection
    {
        return Vote::with("candidate", "voter")->get();
    }
}
