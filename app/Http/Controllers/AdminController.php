<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use App\Models\Competition;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\CompetitionParticipant;
use App\Models\ScholarshipParticipant;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $works = Work::all();
        $competitions = Competition::all();
        $scholarships = Scholarship::all();
        $competitionParticipants = CompetitionParticipant::all();
        $scholarshipParticipants = ScholarshipParticipant::all();
        $tableComPars = CompetitionParticipant::latest()->limit(5)->get();
        $tableScholarPars = ScholarshipParticipant::latest()->limit(5)->get();
        $countCompetitions = $competitions->count();
        $countScholarships = $scholarships->count();
        $countWorks = $works->count();
        $countUsers = $users->count();

        $registeredCompetitionIds = CompetitionParticipant::distinct('competition_id')->pluck('competition_id');
        $totalRegisteredCompetitions = $registeredCompetitionIds->count();
        $averageCompetitionParticipantCount = $totalRegisteredCompetitions > 0 ? number_format($competitionParticipants->count() / $totalRegisteredCompetitions, 2) : 0;

        $registeredScholarshipIds = ScholarshipParticipant::distinct('scholarship_id')->pluck('scholarship_id');
        $totalRegisteredScholarships = $registeredScholarshipIds->count();
        $averageScholarshipParticipantCount = $totalRegisteredScholarships > 0 ? number_format($scholarshipParticipants->count() / $totalRegisteredScholarships, 2) : 0;

        $activeCompetitions = $competitions->where('status', 'ongoing')->count();
        $activeScholarships = $scholarships->where('status', 'ongoing')->count();

        return view('/admin/dashboard', [
            'users' => $users,
            'works' => $works,
            'competitions' => $competitions,
            'scholarships' => $scholarships,
            'competitionParticipants' => $competitionParticipants,
            'scholarshipParticipants' => $scholarshipParticipants,
            'countCompetitions' => $countCompetitions,
            'countScholarships' => $countScholarships,
            'countWorks' => $countWorks,
            'countUsers' => $countUsers,
            'averageCompetitionParticipantCount' => $averageCompetitionParticipantCount,
            'averageScholarshipParticipantCount' => $averageScholarshipParticipantCount,
            'activeCompetitions' => $activeCompetitions,
            'activeScholarships' => $activeScholarships,
            'tableComPars' => $tableComPars,
            'tableScholarPars' => $tableScholarPars
        ]);
    }

}
