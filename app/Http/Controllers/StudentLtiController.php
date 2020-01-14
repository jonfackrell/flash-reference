<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class StudentLtiController extends Controller
{
    public function __invoke(Request $request, Institution $institution)
    {
        return view('lti.student.index');
    }
}
