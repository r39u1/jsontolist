<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonToListController extends Controller
{
    protected const URL_REGEX = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
    protected const RGB_SEMICOLONS_REGEX = '/^\(\d+;\d+;\d+\)$/';
    protected const RGB_COMMAS_REGEX = '/^\(\d+,\d+,\d+\)$/';
    protected const NUMBER_REGEX = '/^\d+$/';
    protected const MAX_REGEX = '/^max$/i';

    public function convert(Request $request) 
    {
        $validated = $request->validate([
            'json' => ['required', 'json'],
            'depth' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (!preg_match(self::NUMBER_REGEX, $value) and 
                        !preg_match(self::MAX_REGEX, $value) or
                        strval($value) === '0') {
                        $fail('The ' . $attribute . ' is invalid.');
                    }
                }
            ],
            'background' => [
                'nullable', 
                function ($attribute, $value, $fail) {
                    if (!preg_match(self::URL_REGEX, $value) and
                        !preg_match(self::RGB_SEMICOLONS_REGEX, $value) and
                        !preg_match(self::RGB_COMMAS_REGEX, $value)) {
                        $fail('The ' . $attribute . ' is invalid.');
                    }
                }
            ]
        ]);
        
        $data = json_decode($validated['json']);

        $depth = $validated['depth'];

        $background = $validated['background'];

        if (!is_null($background)) {
            $background = $this->prepare_background($validated['background']);
        }        

        return view('json_to_list', [
            'data' => $data,
            'depth' => $depth,
            'background' => $background
        ]);
    }

    protected function prepare_background($background)
    {
        $backgroundUrl = null;
        $backgroundRgb = null;

        if(preg_match(self::URL_REGEX, $background)) {
            $backgroundUrl = $background;
        } elseif(preg_match(self::RGB_COMMAS_REGEX, $background)) {
            $backgroundRgb = $background;
        } elseif(preg_match(self::RGB_SEMICOLONS_REGEX, $background)) {
            $backgroundRgb = str_replace(';', ',', $background);
        }

        return ['url' => $backgroundUrl, 'rgb' => $backgroundRgb];
    }
}
