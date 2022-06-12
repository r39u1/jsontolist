<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonToListController extends Controller
{
    public function convert(Request $request) 
    {
        $data = json_decode($request->input('json'));

        $depth = $request->input('depth');

        $background = $this->validate_background($request->input('background'));

        return view('json_to_list', [
            'data' => $data,
            'depth' => $depth,
            'backgroundUrl' => $background['url'],
            'backgroundRgb' => $background['rgb']
        ]);
    }

    private function validate_background($background)
    {
        $backgroundUrl = null;
        $backgroundRgb = null;

        $urlValidateRegex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $rgbSemicolonsValidateRegex = '/^\(\d+;\d+;\d+\)$/';
        $rgbCommasValidateRegex = '/^\(\d+,\d+,\d+\)$/';

        if(preg_match($urlValidateRegex, $background)) {
            $backgroundUrl = $background;
        } elseif(preg_match($rgbCommasValidateRegex, $background)) {
            $backgroundRgb = $background;
        } elseif(preg_match($rgbSemicolonsValidateRegex, $background)) {
            $backgroundRgb = str_replace(';', ',', $background);
        }

        return ['url' => $backgroundUrl, 'rgb' => $backgroundRgb];
    }
}
