<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scholarship extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'organizer',
        'description',
        'requirement',
        'image',
        'start_registration',
        'end_registration',
        'start_scholarship',
        'end_scholarship',
        'status',
    ];

    protected $attributes = [
        'status' => 'upcoming'
    ];

    public function scholarship_participants()
    {
        return $this->hasMany(ScholarshipParticipant::class);
    }

    public function awardees()
    {
        return $this->hasMany(Awardee::class);
    }
}
