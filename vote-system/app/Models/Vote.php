<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $candidate_id
 * @property int $candidate_voted_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Voter $candidate
 * @property-read \App\Models\Voter $voter
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereCandidateVotedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vote whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
