<?php

namespace App\Http\Controllers;

use App\Models\UserCV;
use App\Models\University;
use App\Models\Technology;
use App\Models\CVTechnology;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserCV;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CVController extends Controller
{
    public function index() {

        $technologies = Technology::get();
        $universities = University::select('id', 'name')->get();

        return view('create_cv', [
            'technologies' => $technologies,
            'universities' => $universities,
        ]);
    }

    public function store(StoreUserCV $request) {

        if ($request->get('date_of_birth') != null) {
            $birthDate = explode('/', $request->get('date_of_birth'));
            $birthDate = $birthDate[2].'-'.$birthDate[1].'-'.$birthDate[0];
            $request->request->set('date_of_birth', $birthDate);
        }

        $userCV = UserCV::create($request->input());

        if ($request->get('technology_ids') != null) {
            $technologyIds = $request->get('technology_ids');
            foreach ($technologyIds as $technologyId) {
                CVTechnology::create([
                    'user_cv_id' => $userCV->id,
                    'technology_id' => $technologyId,
                ]);
            }
        }

        return redirect()->back();
    }
}
