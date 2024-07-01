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
            'name.required' => 'the name must be string with max 20 characters',
            'email.required' => 'email is required',
            'image.required' => 'please upload a profile image',
            'fb.required' => 'please enter your facebook url',
            'twitter.required' => 'please enter your twitter url',
            'insta.required' => 'please enter your twitter url',
            'subjects.required' => 'please select two subjects',
            'subjects.min' => 'you must select exactly two subjects',
            'subjects.max' => 'you must select only two subjects',
            'subjects.distinct' => 'dublicate values',
            'subjects.*.exists' => 'you must select subjects',

        ];
    }
}
