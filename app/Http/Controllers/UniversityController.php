<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UniversityController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'grade' => 'required|numeric|min:1|max:10',
        ]);

        if (!$validator->fails()) {
            $university = University::create($request->input());
            $universities = University::select('id', 'name')->get();

            return json_encode($universities);
        }

        return false;
    }
}
