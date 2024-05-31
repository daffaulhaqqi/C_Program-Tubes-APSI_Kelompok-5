<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::latest()->simplePaginate(5);
        return view('/admin/work/index', [
            'works' => $works
        ]);
    }

    public function create()
    {
        return view('/admin/work/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_name' => 'required',
            'company' => 'required',
            'description' => 'required',
            'information' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'contact' => 'required',
            'email' => 'required',
            'salary' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file('image')->storeAs('work-images', $imageName);

        $works = new Work();
        $works->job_name = $request->job_name;
        $works->company = $request->company;
        $works->description = $request->description;
        $works->information = $request->information;
        $works->image = $imageName;
        $works->contact = $request->contact;
        $works->email = $request->email;
        $works->salary = $request->salary;
        $works->save();

        return redirect('/admin/work/index');
    }

    public function detail($id)
    {
        $works = Work::findOrFail($id);
        return view('/admin/work/details', [
            'works' => $works
        ]);
    }

    public function edit($id)
    {
        $works = Work::findOrFail($id);
        return view('/admin/work/edit', [
            'works' => $works
        ]);
    }

    public function update(Request $request, $id)
    {
        $works = Work::findOrFail($id);

        $request->validate([
            'job_name' => 'required',
            'company' => 'required',
            'description' => 'required',
            'information' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp',
            'contact' => 'required',
            'email' => 'required',
            'salary' => 'required',
        ]);

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;

            Storage::delete('work-images/'.$works->image);

            $request->file('image')->storeAs('work-images', $newName);
            $request['image'] = $newName;
            $works->image = $newName;
        }

        $works->job_name = $request->job_name;
        $works->company = $request->company;
        $works->description = $request->description;
        $works->information = $request->information;
        $works->contact = $request->contact;
        $works->email = $request->email;
        $works->salary = $request->salary;
        $works->update();

        return redirect('/admin/work/index');
    }

    public function delete($id)
    {
        $works = Work::findOrFail($id);
        $works->delete();
        return redirect('/admin/work/index');
    }

    public function deletelist()
    {
        $works = Work::onlyTrashed()->get();
        return view('admin/work/delete', [
            'works' => $works,
        ]);
    }

    public function restore($id)
    {
        $works = Work::withTrashed()->findOrFail($id);
        $works->restore();
        return redirect('admin/work/index');
    }
}
