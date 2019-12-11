<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Lecture;
use App\Student;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function create()
    {
        $students = Student::all();
        $lectures = Lecture::all();

        return view('grades.create', compact(['students', 'lectures']));
    }

    public function store(Request $request)
    {
        $grade = new Grade();

        $grade->student_id = $request->input( 'student_id' );
        $grade->lecture_id  = $request->input( 'lecture_id' );
        $grade->grade = $request->input( 'grade');

        $grade->save();

        session()->flash('message', 'Ivertinimas sekmingai ivestas');

        return redirect()->route( 'students.index');
    }


    public function show($id)
    {
        $lectures = Lecture::all();
        $grade = Grade::all();

        return view('students.show', compact(['lectures', 'grade']));
    }

}
