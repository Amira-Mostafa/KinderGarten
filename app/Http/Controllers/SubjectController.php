<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Trait\common;

class SubjectController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::get();
        return view('admin.subjects', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addSubject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $subject = new Subject;
        $subject->subject = $request->subject;
        $subject->image = $this->uploadFile($request->image, 'assets/images');
        $subject->save();
        return redirect()->route('subjects')->with('success', 'Subject was created successfully');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subjects = Subject::findOrFail($id);
        return view('admin.showSubject', compact('subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjects = Subject::findOrFail($id);
        return view('admin.editSubject', compact("subjects"));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $data = [
            'subject' => $request->subject,
        ];

        if ($request->hasFile('image')) {
            $file_name = $this->uploadFile($request->image, 'assets/images');
            $data['image'] = $file_name;
        }

        Subject::where('id', $id)->update($data);
        return redirect()->route('subjects')->with('success, Subject was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::where('id', $id)->Delete();
        return redirect()->route('subjects')->with('success, Subject was created successfully');
    }
}
