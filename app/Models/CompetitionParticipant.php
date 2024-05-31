<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetitionParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'competition_id',
        'fullname',
        'nik',
        'nim',
        'instance',
        'department',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function competitions()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }

    public function winners()
    {
        return $this->hasMany(Winner::class);
    }
}
