<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Trait\common;

class TestimonialController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $testimonials = Testimonial::get();
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimonials = new Testimonial;
        $testimonials->name = $request->name;
        $testimonials->profession = $request->profession;
        $testimonials->image = $this->uploadFile($request->image, 'assets/images');
        $testimonials->comment = $request->comment;
        $testimonials->save();
        // dd($request->all());
        return redirect()->route('testimonials')->with('success, the comment is added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.showTestimonial', compact('testimonials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.editTestimonial', compact('testimonials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'Profession' => $request->Profession,
            'active' => isset($request->active),
            'comment' => $request->comment
        ];
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images');
        }
        Testimonial::where('id', $id)->update($data);
        return redirect()->route('testimonials')->with('success, data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::findOrFail($id)->delete();
        return redirect()->route('testimonials')->with('success, data deleted successfuly');
    }
}
