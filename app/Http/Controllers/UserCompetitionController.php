<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompetitionParticipant;

class UserCompetitionController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $competitions = Competition::latest()->simplePaginate(4);
        return view('/user/competition/index', [
            'competitions' => $competitions,
            'users' => $users
        ]);
    }

    public function details($id)
    {
        $users = Auth::user();
        $competitions = Competition::findOrFail($id);
        return view('/user/competition/details', [
            'competitions' => $competitions,
            'users' => $users
        ]);
    }

    public function registration($id)
    {
        $competitions = Competition::findOrFail($id);
        $users = Auth::user();
        return view('/user/competition/registration', [
            'competitions' => $competitions,
            'users' => $users
        ]);
    }

    public function store(Request $request, $id)
    {
        $competitions = Competition::findOrFail($id);
        $users = Auth::user();

        $request->validate([
            'fullname' => 'required',
            'nik' => 'required',
            'nim' => 'required',
            'instance' => 'required',
            'department' => 'required',
        ]);

        // Periksa apakah nik sudah ada untuk kompetisi ini
        $nikExists = CompetitionParticipant::where('competition_id', $competitions->id)
            ->where('nik', $request->nik)
            ->exists();

        if ($nikExists) {
        return back()->withErrors(['error' => 'The NIK has already been taken for this competition.'])->withInput();
        }

        // Periksa apakah nim sudah ada untuk kompetisi ini
        $nimExists = CompetitionParticipant::where('competition_id', $competitions->id)
            ->where('nim', $request->nim)
            ->exists();

        if ($nimExists) {
        return back()->withErrors(['error' => 'The NIM has already been taken for this competition.'])->withInput();
        }

        // Periksa apakah pengguna sudah terdaftar di kompetisi ini
        $exists = CompetitionParticipant::where('user_id', $users->id)->where('competition_id', $competitions->id)->exists();

        if ($exists) {
            return back()->withErrors(['error' => 'You have already registered for this competition.'])->withInput();
        }

        $compars = new CompetitionParticipant();
        $compars->fullname = $request->fullname;
        $compars->nik = $request->nik;
        $compars->nim = $request->nim;
        $compars->instance = $request->instance;
        $compars->department = $request->department;
        $compars->user_id = $users->id;
        $compars->competition_id = $competitions->id;
        $compars->save();

        return redirect()->route('user.activity.index');
    }

    public function participant($id)
    {
        $users = Auth::user();
        $competitions = Competition::findOrFail($id);
        $winners = Winner::where('competition_id', $competitions->id)->orderByRaw('CAST(position AS UNSIGNED)')->get();
        $competitionParticipants = CompetitionParticipant::where('competition_id', $competitions->id)->get();
        return view('/user/competition/participant', [
            'competitionParticipants' => $competitionParticipants,
            'competitions' => $competitions,
            'winners' => $winners,
            'users' => $users,
        ]);
    }

    public function unenroll($id)
    {
        $competitionParticipants = CompetitionParticipant::findOrFail($id);
        $competitionParticipants->delete();
        return redirect()->route('user.activity.index');
    }
}
