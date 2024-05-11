<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use App\Models\Subject;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('subjects')->get();
        return view('admin.teachers', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       $subjects = Subject::select('id', 'subject')->get();
       return view('admin.addTeacher', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $data = $request->validate([
            'name'=> 'required|string|max:20',
            // 'Fsubject' => 'required',
            // 'Ssubject' => 'required',
            //'profileImage' => 'required|max:2048',

        ]);
        Teacher::create($data);
        return redirect('teachers');


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teachers = Teacher::findOrFail($id);
        return view('admin.showTeacher', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers = Teacher::findOrfail($id);
        $subjects = Subject::select('id', 'subject')->get();

        //dd($teachers);
        //$subjects  = Subject::select('subject_id', 'teacher_id')->first();
        //$subjects  = Subject::where('id', $id)->first();
        // Car::where('id', $id)->
        return view('admin.editTeacher', compact('teachers', 'subjects'));
    }
    // <!-- @selected($sub->id == optional($teachers->subjects)->subject_id) -->
    // <!-- @selected($sub->id == $teachers->subjects->subject_id) -->
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
