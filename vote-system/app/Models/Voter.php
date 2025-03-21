<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $lastName
 * @property string $document
 * @property \Illuminate\Support\Carbon|null $dob
 * @property bool $is_candidate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereIsCandidate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastName',
        'document',
        'dob',
        'is_candidate',
    ];


    protected $casts = [
        'dob' => 'date',
        'is_candidate' => 'boolean',
    ];
}
