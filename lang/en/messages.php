<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */
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
