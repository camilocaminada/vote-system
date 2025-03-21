<?php

namespace App\Repositories;

use App\Models\Voter;
use Illuminate\Database\Eloquent\Collection;

class VoterRepository
{
    public function create(array $data)
    {
        return Voter::create($data);
    }

    public function findByDocument(string $document) : ?Voter
    {
        return Voter::where('document', $document)->first();
    }

    public function getCandidates() : Collection
    {
        return Voter::whereIsCandidate(true)->get();
    }
}
