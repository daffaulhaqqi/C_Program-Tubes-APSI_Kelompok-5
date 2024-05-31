<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'organizer',
        'description',
        'rules',
        'image',
        'start_registration',
        'end_registration',
        'start_competition',
        'end_competition',
        'status',
    ];

    protected $attributes = [
        'status' => 'upcoming'
    ];

    public function competition_participants()
    {
        return $this->hasMany(CompetitionParticipant::class);
    }

    public function winners()
    {
        return $this->hasMany(Winner::class);
    }
}
