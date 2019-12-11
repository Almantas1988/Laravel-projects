<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;

class StudentsController extends Controller
{
    public function __construct() {

        $this->middleware( 'auth' )->except( [ 'login' ] );
    }


    public function index()
    {
        $students = Student::all();

        $students = Student::orderBy('surname')->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $students = Student::all();

        return view('students.create', compact('students'));
    }


    public function store(StudentStoreRequest $request)
    {
        $students = new Student();
        $students->name = $request->input('name');
        $students->surname = $request->input('surname');
        $students->email = $request->input('email');
        $students->phone = $request->input('phone');
        
        $students->save();
        
        session()->flash('message', 'Studentas sekmingai pridetas');
        
        return redirect()->route('students.index');
    }


    public function show($id)
    {
        $students = Student::findOrFail($id);

        return view('students.show', compact(['students']));
    }

    public function edit($id)
    {
        $students = Student::find($id);

        return view('students.edit', compact('students'));
    }


    public function update(StudentStoreRequest $request, $id)
    {
        $students = Student::find($id);

        $students->name = $request->input('name');
        $students->surname = $request->input('surname');
        $students->email = $request->input('email');
        $students->phone = $request->input('phone');

        $students->save();

        session()->flash('message', 'Studentas sekmingai paredaguotas');

        return redirect()->route('students.show', $students->id);
    }

    public function destroy($id)
    {
        $students = Student::find($id);
        $students->delete();

        session()->flash('message', 'Studentas sekmingai istrintas');

        return redirect()->route('students.index');
    }

    public function studentIndex($id) {
        $students = Student::find($id);

        return view('students.index', compact('students'));

    }
}
