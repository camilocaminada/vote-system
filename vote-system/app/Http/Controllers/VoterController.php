<?php

namespace App\Http\Controllers;

use App\Services\VoterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoterController extends Controller
{
    protected VoterService $voterService;

    public function __construct(VoterService $voterService)
    {
        $this->voterService = $voterService;
    }

    public function store(Request $request): JsonResponse
    {
        $admin = Auth::user();
        if (!$admin) {
            return response()->json(['error' => 'You do not have permission for this action'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'document' => 'required|string|unique:voters,document',
            'dob' => 'nullable|date',
            'is_candidate' => 'boolean',
        ]);

        try {
            $voter = $this->voterService->createVoter($validated);
            return response()->json(['message' => 'Voter created successfully', 'data' => $voter], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating voter'], 500);
        }
    }

    public function getCandidates(): JsonResponse
    {
        $candidates = $this->voterService->listCandidates();
        return response()->json($candidates);
    }

    public function getCandidatesWithVotes(): JsonResponse
    {
        $candidates = $this->voterService->listCandidates(withVotes: true);
        return response()->json($candidates);
    }
}
