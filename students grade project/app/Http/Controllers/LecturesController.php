<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureStoreRequest;
use App\Lecture;
use Illuminate\Http\Request;

class LecturesController extends Controller
{

    public function index()
    {
        $lectures = Lecture::all();

        $lectures = Lecture::orderBy('name')->get();

        return view('lectures.index', compact('lectures'));
    }

    public function create()
    {
        $lectures = Lecture::all();

        return view('lectures.create', compact('lectures'));
    }

    public function store(LectureStoreRequest $request)
    {
        $lectures = new Lecture();
        $lectures->name = $request->input('name');
        $lectures->description = $request->input('description');

//        $lectures->user_id = Auth::user()->id;

        $lectures->save();

        session()->flash('message', 'Paskaita sekmingai prideta');

        return redirect()->route('lectures.index');
    }


    public function show($id)
    {
        $lectures = Lecture::findOrFail($id);

        return view('lectures.show', compact(['lectures']));
    }

    public function edit($id)
    {
        $lectures = Lecture::find($id);

        return view('lectures.edit', compact('lectures'));
    }


    public function update(LectureStoreRequest $request, $id)
    {
        $lectures = Lecture::find($id);

        $lectures->name = $request->input('name');
        $lectures->description = $request->input('description');

        $lectures->save();

        session()->flash('message', 'Paskaita sekmingai paredaguota');

        return redirect()->route('lectures.show', $lectures->id);
    }

    public function destroy($id)
    {
        $lectures = Lecture::find($id);
        $lectures->delete();

        session()->flash('message', 'Paskaita sekmingai istrinta');

        return redirect()->route('lectures.index');
    }
}
