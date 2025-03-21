<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'candidate_voted_id',
    ];

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Voter::class, 'candidate_id');
    }

    public function voter(): BelongsTo
    {
        return $this->belongsTo(Voter::class, 'candidate_voted_id');
    }
}
