<?php

namespace App\Http\Controllers;

use App\Models\Awardee;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\ScholarshipParticipant;
use Illuminate\Support\Facades\Storage;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::latest()->simplePaginate(4);

        return view('/admin/scholarship/index', [
            'scholarships' => $scholarships
        ]);
    }

    public function create()
    {
        return view('/admin/scholarship/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'organizer' => 'required',
            'description' => 'required',
            'requirement' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'start_registration' => 'required',
            'end_registration' => 'required',
            'start_scholarship' => 'required',
            'end_scholarship' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file('image')->storeAs('scholarship-images', $imageName);

        $scholarships = new Scholarship();
        $scholarships->name = $request->name;
        $scholarships->organizer = $request->organizer;
        $scholarships->description = $request->description;
        $scholarships->requirement = $request->requirement;
        $scholarships->image = $imageName;
        $scholarships->start_registration = $request->start_registration;
        $scholarships->end_registration = $request->end_registration;
        $scholarships->start_scholarship = $request->start_scholarship;
        $scholarships->end_scholarship = $request->end_scholarship;
        $scholarships->save();

        return redirect('/admin/scholarship/index');
    }

    public function detail($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        return view('/admin/scholarship/details', [
            'scholarships' => $scholarships
        ]);
    }

    public function edit($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        return view('/admin/scholarship/edit', [
            'scholarships' => $scholarships
        ]);
    }

    public function update(Request $request, $id)
    {
        $scholarships = Scholarship::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'organizer' => 'required',
            'description' => 'required',
            'requirement' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp',
            'start_registration' => 'required',
            'end_registration' => 'required',
            'start_scholarship' => 'required',
            'end_scholarship' => 'required',
        ]);

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;

            Storage::delete('scholarship-images/'.$scholarships->image);

            $request->file('image')->storeAs('scholarship-images', $newName);
            $request['image'] = $newName;
            $scholarships->image = $newName;
        }

        $scholarships->name = $request->name;
        $scholarships->organizer = $request->organizer;
        $scholarships->description = $request->description;
        $scholarships->requirement = $request->requirement;
        $scholarships->start_registration = $request->start_registration;
        $scholarships->end_registration = $request->end_registration;
        $scholarships->start_scholarship = $request->start_scholarship;
        $scholarships->end_scholarship = $request->end_scholarship;
        $scholarships->update();

        return redirect('/admin/scholarship/index');
    }

    public function delete($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $scholarships->delete();
        return redirect('/admin/scholarship/index');
    }

    public function changeRegistration($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        if ($scholarships->status === 'registration' || $scholarships->status === 'ongoing' || $scholarships->status === 'finished') {
            return back()->withErrors(['Error' => 'Your status cant be changed']);
        } else {
            $scholarships->status = 'registration';
            $scholarships->save();
        }
        return redirect('/admin/scholarship/index');
    }

    public function changeOngoing($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        if ($scholarships->status === 'ongoing' || $scholarships->status === 'finished' || $scholarships->status === 'upcoming') {
            return back()->withErrors(['Error' => 'Your status cant be changed']);
        } else {
            $scholarships->status = 'ongoing';
            $scholarships->save();
        }
        return redirect('/admin/scholarship/index');
    }

    public function changeFinished($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        if ($scholarships->status === 'finished' || $scholarships->status === 'upcoming' || $scholarships->status === 'registration') {
            return back()->withErrors(['Error' => 'Your status cant be changed']);
        } else {
            $scholarships->status = 'finished';
            $scholarships->save();
        }
        return redirect('/admin/scholarship/index');
    }

    public function awardee($id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $participants = ScholarshipParticipant::where('scholarship_id', $scholarships->id)->get();
        $countParticipants = $participants->count();

        return view('/admin/scholarship/awardee', [
            'participants' => $participants,
            'scholarships' => $scholarships,
            'countParticipants' => $countParticipants,
        ]);
    }

    public function selectawardee(Request $request, $id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $request->validate([
            'awardee' => 'required|array|min:1',
            'awardee.*' => 'required|integer|distinct',
        ]);

        foreach ($request->awardee as $winnerId) {
            $awardee = new Awardee();
            $awardee->scholarship_id = $scholarships->id;
            $awardee->scholarship_participant_id = $winnerId;
            $awardee->save();
        }

        // Redirect atau berikan respons yang sesuai
        return redirect('/admin/scholarship/index');
    }

    public function editawardee(Request $request, $id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $request->validate([
            'awardee' => 'required|array|min:1',
            'awardee.*' => 'required|integer|distinct',
        ]);

        // Hapus pemenang dengan posisi 1, 2, dan 3 untuk kompetisi ini
        Awardee::where('scholarship_id', $scholarships->id)->delete();

        foreach ($request->awardee as $winnerId) {
            $awardee = new Awardee();
            $awardee->scholarship_id = $scholarships->id;
            $awardee->scholarship_participant_id = $winnerId;
            $awardee->save();
        }

        return redirect('/admin/scholarship/index');
    }

    public function deletelist()
    {
        $scholarships = Scholarship::onlyTrashed()->get();
        return view('admin/scholarship/delete', [
            'scholarships' => $scholarships,
        ]);
    }

    public function restore($id)
    {
        $scholarships = Scholarship::withTrashed()->findOrFail($id);
        $scholarships->restore();
        return redirect('admin/scholarship/index');
    }
}
