<?php

namespace App\Repositories;

use App\Models\Voter;

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
}
