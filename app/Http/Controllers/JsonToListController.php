<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonToListController extends Controller
{
    public function convert(Request $request) 
    {
        $data = json_decode($request->input('json'));
        $depth = $request->input('depth');
        return view('json_to_list', [
            'data' => $data,
            'depth' => $depth
        ]);
    }
}
