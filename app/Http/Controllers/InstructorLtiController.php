<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstructorLtiController extends Controller
{
    public function __invoke(Request $request, Institution $institution)
    {
        $user = auth('lti')->user();
        $sets = $user->sets()->where('institution_id', $institution->id);
        if($request->has('q')){
            $sets = $sets->where('name', 'LIKE', '%' . $request->get('q') . '%');
        }
        $sets = $sets->get();
        $sets->loadCount('cards');
        return view('lti.instructor.index', [
            'institution' => $institution,
            'sets' => $sets,
        ]);
    }
}
