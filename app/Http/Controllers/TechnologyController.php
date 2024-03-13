<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TechnologyController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if (!$validator->fails()) {
            $technology = Technology::create($request->input());
            $technologies = Technology::select('id', 'name')->get();

            return json_encode($technologies);
        }

        return false;
    }
}
