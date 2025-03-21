<?php

namespace App\Http\Controllers;

use App\Services\VoteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    protected VoteService $voteService;

    public function __construct(VoteService $voteService)
    {
        $this->voteService = $voteService;
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'document' => 'required|string|exists:voters,document',
            'candidate_id' => 'required|integer|exists:voters,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $this->voteService->registerVote($validator->getValue("document"), $validator->getValue("candidate_id"));
            return response()->json(['message' => "Vote successfully"], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
