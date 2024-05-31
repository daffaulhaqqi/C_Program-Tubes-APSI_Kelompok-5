<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Competition;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompetitionParticipant;
use App\Models\ScholarshipParticipant;

class UserController extends Controller
{
    public function dashboard()
    {
        $competitions = Competition::latest()->limit(3)->get();
        $scholarships = Scholarship::latest()->limit(3)->get();
        $works = Work::latest()->limit(6)->get();
        return view('/user/dashboard', [
            'competitions' => $competitions,
            'scholarships' => $scholarships,
            'works' => $works,
        ]);
    }

    public function activity()
    {
        $users = Auth::user();

        $competitionParticipants = CompetitionParticipant::where('user_id', $users->id)->with('competitions')->latest()->get();
        $competitions = $competitionParticipants->map(function ($participant) {
            return $participant->competitions;
        });

        $scholarshipParticipants = ScholarshipParticipant::where('user_id', $users->id)->with('scholarships')->latest()->get();
        $scholarships = $scholarshipParticipants->map(function ($participant) {
            return $participant->scholarships;
        });

        return view('/user/activity/index', [
            'competitions' => $competitions,
            'competitionParticipants' => $competitionParticipants,
            'scholarships' => $scholarships,
            'scholarshipParticipants' => $scholarshipParticipants,
        ]);
    }
}
