<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonToListController extends Controller
{
    public function convert(Request $request) 
    {
        if ($request->isJson()) {
            $data = json_decode($request->input('json'));
            return view('json_to_list', ['data' => $data]);
        } else {
            return "dd($request)";
        }     
    }
}
