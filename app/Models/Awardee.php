<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Awardee extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholarship_id',
        'scholarship_participant_id',
    ];

    public function scholarship_participants()
    {
        return $this->belongsTo(ScholarshipParticipant::class, 'scholarship_participant_id');
    }

    public function scholarships()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }
}
