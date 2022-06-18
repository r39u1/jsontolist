<?php

namespace App\Http\Controllers;

use App\Http\Requests\JsonToListRequest;

class JsonToListController extends Controller
{
    public function decode(JsonToListRequest $request) 
    {
        $validated = $request->validated();
        
        $data = json_decode($validated['json']);

        $depth = $validated['depth'];

        $background = $validated['background'];      

        return view('json_to_list', [
            'data' => $data,
            'depth' => $depth,
            'background' => $background
        ]);
    }
}
