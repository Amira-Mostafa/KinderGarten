<?php

namespace App\Http\Controllers;

use App\Trait\common;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use App\Models\Subject;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    use common;
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
    public function store(Request $request)
    {
        $message = $this->messages();
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'sometimes|email',
            'image' => 'sometimes|image|max:2048',
            'fb' => 'required|url',
            'twitter' => 'required|url',
            'insta' => 'required|url',
            'subjects' => 'required|array|min:2|max:2',
            'subjects.*' => 'exists:subjects,id|distinct',
        ], $message);
        try {
            $data['image'] = $this->uploadFile($request->image, 'assets/images');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to upload image.');
        }
        $teacher = Teacher::create($data);
        $subjects = $request->input('subjects');
        foreach ($subjects as $index => $subjectId) {
            $teacher->subjects()->attach($subjectId, ['preference' => $index + 1]);
        }

        return redirect()->route('teachers')->with('success', 'Teacher was created successfully');
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
        return view('admin.editTeacher', compact('teachers', 'allSubjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->messages();
        $data = $request->validate([
            'name' => 'sometimes|string|max:20',
            'email' => 'sometimes|email',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'fb' => 'sometimes|url',
            'twitter' => 'sometimes|url',
            'insta' => 'sometimes|url',
            'subjects' => 'sometimes|array|min:2|max:2',
            'subjects.*' => 'exists:subjects,id|distinct',
        ], $message);
        $data['active'] = isset($request->active);
        if ($request->hasFile('image')) {
            try {
                $data['image'] = $this->uploadFile($request->image, 'assets/images');
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to upload image.');
            }
        }

        //making db transaction
        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);
            $teacher->update($data);
            if ($request->has('subjects')) {
                $teacher->subjects()->detach();
                $subjects = $request->input('subjects');
                foreach ($subjects as $index => $subjectId) {
                    $teacher->subjects()->attach($subjectId, ['preference' => $index + 1]);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to update teacher.');
        }
        // dd($request->all());
        return redirect()->route('teachers')->with('success', 'Teacher updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //softDelete (it still in the db)
    {
        Teacher::where('id', $id)->delete(); //softDelete
        return redirect()->route('teachers')->with('success', 'Teacher is deleted successfully.');
    }

    public function trashed() //shows the soft deleted items
    {
        $teachers = Teacher::onlyTrashed()->get();
        return view('admin.trashed', compact('teachers'));
    }
    public function restore(string $id)
    {
        Teacher::where('id', $id)->restore();
        return redirect()->route('teachers')->with('success', 'Teacher is restored successfully.');
    }
    public function forceDelete(string $id)
    {
        Teacher::where('id', $id)->forceDelete();
        return redirect()->route('teachers')->with('success', 'Teacher deleted successfully.');
    }
}

// <div class="col-md-7 col-7">
// <p>First preference: {{ $teachers->subjects[0]->subject }}</p>
// </div>