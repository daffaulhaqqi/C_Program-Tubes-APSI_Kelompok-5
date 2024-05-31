<?php

namespace App\Http\Controllers;

use App\Models\Awardee;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ScholarshipParticipant;

class UserScholarshipController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $scholarships = Scholarship::latest()->simplePaginate(4);
        return view('/user/scholarship/index', [
            'scholarships' => $scholarships,
            'users' => $users
        ]);
    }

    public function details($id)
    {
        $users = Auth::user();
        $scholarships = Scholarship::findOrFail($id);
        return view('/user/scholarship/details', [
            'scholarships' => $scholarships,
            'users' => $users
        ]);
    }

    public function registration($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $users = Auth::user();
        return view('/user/scholarship/registration', [
            'scholarships' => $scholarships,
            'users' => $users
        ]);
    }

    public function store(Request $request, $id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $users = Auth::user();

        $request->validate([
            'fullname' => 'required',
            'nik' => 'required',
            'nim' => 'required',
            'instance' => 'required',
            'department' => 'required',
        ]);

        // Periksa apakah pengguna sudah terdaftar di kompetisi ini
        $exists = ScholarshipParticipant::where('user_id', $users->id)->where('scholarship_id', $scholarships->id)->exists();

        if ($exists) {
            return back()->withErrors(['error' => 'You have already registered for this scholarships.'])->withInput();
        }

         // Periksa apakah nik sudah ada untuk beasiswa ini
        $nikExists = ScholarshipParticipant::where('scholarship_id', $scholarships->id)
            ->where('nik', $request->nik)
            ->exists();

        if ($nikExists) {
        return back()->withErrors(['error' => 'The NIK has already been taken for this scholarship.'])->withInput();
        }

        // Periksa apakah nim sudah ada untuk beasiswa ini
        $nimExists = ScholarshipParticipant::where('scholarship_id', $scholarships->id)
            ->where('nim', $request->nim)
            ->exists();

        if ($nimExists) {
        return back()->withErrors(['error' => 'The NIM has already been taken for this scholarship.'])->withInput();
        }

        $scholarpars = new ScholarshipParticipant();
        $scholarpars->fullname = $request->fullname;
        $scholarpars->nik = $request->nik;
        $scholarpars->nim = $request->nim;
        $scholarpars->instance = $request->instance;
        $scholarpars->department = $request->department;
        $scholarpars->user_id = $users->id;
        $scholarpars->scholarship_id = $scholarships->id;
        $scholarpars->save();

        return redirect()->route('user.activity.index');
    }

    public function participant($id)
    {
        $users = Auth::user();
        $scholarships = Scholarship::findOrFail($id);
        $awardees = Awardee::where('scholarship_id', $scholarships->id)->get();
        $scholarshipParticipants = ScholarshipParticipant::where('scholarship_id', $scholarships->id)->get();
        return view('/user/scholarship/participant', [
            'scholarshipParticipants' => $scholarshipParticipants,
            'scholarships' => $scholarships,
            'awardees' => $awardees,
            'users' => $users,
        ]);
    }

    public function unenroll($id)
    {
        $scholarshipParticipants = ScholarshipParticipant::findOrFail($id);
        $scholarshipParticipants->delete();
        return redirect()->route('user.activity.index');
    }
}
