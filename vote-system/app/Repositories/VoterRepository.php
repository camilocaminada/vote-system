<?php

namespace App\Repositories;

use App\Models\Voter;
use Illuminate\Database\Eloquent\Collection;

class VoterRepository
{
    public function create(
        string $name,
        string $lastName,
        string $document,
        string $dob,
        bool $is_candidate = false
    ) : Voter
    {
        return Voter::create([
            'name' => $name,
            'lastName' => $lastName,
            'document' => $document,
            'dob' => $dob,
            'is_candidate' => $is_candidate,
        ]);
    }

    public function list(): Collection
    {
        return Voter::all();
    }

    public function findByDocument(string $document) : ?Voter
    {
        return Voter::where('document', $document)->first();
    }

    public function getCandidates() : Collection
    {
        return Voter::whereIsCandidate(true)->get();
    }

    public function getCandidatesWithVotes() : Collection
    {
        return Voter::whereIsCandidate(true)
            ->withCount("votes")
            ->orderBy("votes_count", "desc")
            ->get();
    }
}
