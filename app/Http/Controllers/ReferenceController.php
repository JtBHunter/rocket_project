<?php

namespace App\Http\Controllers;

use App\Models\UserCV;
use App\Models\University;
use App\Models\Technology;
use App\Models\CVTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ReferenceController extends Controller
{
    public function referenceOne() {

        return view('reference_one');
    }

    public function referenceTwo() {

        return view('reference_two');
    }

    public function fetchCVs(Request $request) {

        $validator = Validator::make($request->all(), [
            'periodFrom' => 'required|date_format:d/m/Y',
            'periodTo' => 'required|date_format:d/m/Y',
        ]);

        if (!$validator->fails()) {

            $periodFrom = explode('/', $request->get('periodFrom'));
            $periodFrom = $periodFrom[2].'-'.$periodFrom[1].'-'.$periodFrom[0];

            $periodTo = explode('/', $request->get('periodTo'));
            $periodTo = $periodTo[2].'-'.$periodTo[1].'-'.$periodTo[0];

            if ($request->get('referenceNumber') == 1) {
                $userCVs = UserCV::select('id', 'first_name', 'middle_name', 'last_name', 'date_of_birth', 'university_id')
                    ->where([['date_of_birth', '>=', $periodFrom], ['date_of_birth', '<=', $periodTo]])
                    ->with('techologies', 'university')
                    ->get();
            } else {
                $userCVs = UserCV::select('id', 'date_of_birth')
                    ->where([['date_of_birth', '>=', $periodFrom], ['date_of_birth', '<=', $periodTo]])
                    ->with('techologies')
                    ->get();

                $filteredUserCVs = [];

                foreach ($userCVs as $userCV) {
                    if (!empty($filteredUserCVs) && array_key_exists($userCV['date_of_birth'], $filteredUserCVs)) {
                        $techologies = [];
                        if (!empty($userCV['techologies'])) {
                            foreach ($userCV['techologies'] as $techology) {
                                if (!in_array($techology['name'], $filteredUserCVs[$userCV['date_of_birth']]['techologies'])) {
                                    array_push($techologies, $techology['name']);
                                }
                            }
                        }
                        $filteredUserCVs[$userCV['date_of_birth']]['number'] = $filteredUserCVs[$userCV['date_of_birth']]['number'] + 1;
                        $filteredUserCVs[$userCV['date_of_birth']]['techologies'] = array_merge($filteredUserCVs[$userCV['date_of_birth']]['techologies'], $techologies);
                    } else {
                        $techologies = [];
                        if (!empty($userCV['techologies'])) {
                            foreach ($userCV['techologies'] as $techology) {
                                array_push($techologies, $techology['name']);
                            }
                        }
                        $filteredUserCVs[$userCV['date_of_birth']] = ['date_of_birth' => $userCV['date_of_birth'], 'number' => 1, 'techologies' => $techologies];
                    }
                }

            }

            return json_encode($filteredUserCVs);
        }

        return false;
    }
}
