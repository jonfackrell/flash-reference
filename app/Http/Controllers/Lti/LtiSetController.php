<?php

namespace App\Http\Controllers\Lti;

use App\Card;
use App\Charts\SetViewsSummary;
use App\Http\Controllers\Controller;
use App\Institution;
use App\Set;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LtiSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  Institution  $institution
     * @param  uuid  $uuid
     * @return \Illuminate\Http\Response
     */
    public function flashcards(Institution $institution, $uuid)
    {
        $set = Set::whereUuid($uuid, 'uuid')->first();

        $set->load('cards');

        return view('lti.sets.flashcards' , [
            'course' => $set->course,
            'set' => $set,
        ]);
    }
}
