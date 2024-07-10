<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Classes;
use App\Trait\common;

class ClassController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function getTeachers($subjectId)
    {
        // // Fetch teachers who can teach the selected subject
        // $teachers = Subject::find($subjectId)->teachers()->get();
        // return response()->json($teachers);
    }

    public function index()
    {
        $classes = Classes::with('subject', 'teacher')->get();
        return view('admin.classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::get();
        $subjects = Subject::get();
        $teachers = Teacher::get();
        return view('admin.addClass', compact('teachers', 'subjects', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $this->messages();
        $data = $request->validate([
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'price' => 'required',
            'ageGroup' => 'required',
            'start' => 'required',
            'end' => 'required',
            'capacity' => 'required',
        ], $message);
        Classes::create($data);
        return redirect()->route('classes')->with('success, class was saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classes = Classes::with('subject', 'teacher')->findOrFail($id);
        return view('admin.showClass', compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjects = Subject::select('id', 'subject')->get();
        $teachers = Teacher::select('id', 'name')->get();
        $classes = Classes::with('teacher', 'subject')->findOrFail($id);
        return view('admin.editClass', compact('classes', 'teachers', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'teacher_id' => 'sometimes',
            'subject_id' => 'sometimes',
            'price' => 'sometimes',
            'ageGroup' => 'sometimes',
            'start' => 'sometimes',
            'end' => 'sometimes',
            'capacity' => 'sometimes',
        ]);
        $data['active'] = isset($request->active);
        Classes::findOrFail($id)->update($data);
        return redirect()->route('classes')->with('success, data is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classes::findOrFail($id)->delete();
        return redirect()->route('classes')->with('success, class is deleted successfully');
    }
}
