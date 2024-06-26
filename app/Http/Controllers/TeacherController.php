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
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required',
            'profileImage' => 'required|max:2048',
            'subject_id' => 'required|array',
            // 'subject_id.*' => [
            //     'required',
            //     'exists:subjects,id',
            //     'unique:teacher_subject,subject_id',
            // ],
            // ], [
            //     'subject_id.*.exists' => 'Your message here',
        ]);

        // Teacher::create($data);
        // return redirect('teachers');
        return dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teachers = Teacher::with('subjects')->findOrFail($id);
        return view('admin.showTeacher', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $teachers = Teacher::with('subjects')->findOrFail($id);
        $allSubjects = Subject::select('id', 'subject')->get();

        // dd($teachers);
        return view('admin.editTeacher', compact('teachers', 'allSubjects'));
    }

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
// <div class="col-md-7 col-7">
// <p>First preference: {{ $teachers->subjects[0]->subject }}</p>
// </div>