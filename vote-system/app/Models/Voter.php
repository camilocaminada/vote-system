<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
