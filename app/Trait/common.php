<?php

namespace App\Trait;

trait common
{


    public function uploadFile($file, $path)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $file->move($path, $file_name);
        return $file_name; //or $file but i want the name to be in db
    }
    private function messages()
    {
        return [
            //validation of the classes
            'teacher_id.required' => 'required',
            'subject_id.required' => 'required',
            'price.required' => 'required',
            'age_group.required' => 'required',
            'start.required' => 'required',
            'end.required' => 'required',
            'capacity.required' => 'required',
            //validation of the teachers
            'name.required' => 'the name must be string with max 20 characters',
            'name.max' => 'The name may not be greater than 20 characters.',
            'email.required' => 'email is required',
            'email.email' => 'The email must be a valid email address.',
            'image.required' => 'please upload a profile image',
            'image.mimes' => 'The image must be a file of type: png, jpg, jpeg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            'fb.required' => 'please enter your facebook url',
            'twitter.required' => 'please enter your twitter url',
            'insta.required' => 'please enter your twitter url',
            'subjects.required' => 'please select two subjects',
            'subjects.array' => 'The subjects field must be an array.',
            'subjects.min' => 'you must select exactly two subjects',
            'subjects.max' => 'you must select only two subjects',
            'subjects.*.exists' => 'you must select subjects',
            'subjects.*.distinct' => 'Each subject must be unique. Please select different subjects.',

        ];
    }
}
