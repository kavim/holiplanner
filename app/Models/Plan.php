<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];


    /**
    * Relationships
    */

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
