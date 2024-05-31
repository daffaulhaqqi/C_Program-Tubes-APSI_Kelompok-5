<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id',
        'competition_participant_id',
        'position',
    ];

    public function competition_participants()
    {
        return $this->belongsTo(CompetitionParticipant::class, 'competition_participant_id');
    }

    public function competitions()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }
}
