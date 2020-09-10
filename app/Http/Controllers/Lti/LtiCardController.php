<?php

namespace App\Http\Controllers\Lti;

use App\Course;
use App\Card;
use App\Http\Controllers\Controller;
use App\Set;
use Illuminate\Http\Request;

class LtiCardController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  Course  $course
     * @param  Set  $set
     * @return \Illuminate\Http\Response
     */
    public function viewed(Request $request, Course $course, Set $set)
    {


        return response()->json(['status' => true]);
    }

    /**
     * Star the specified resource.
     *
     * @param  \App\FlashCard  $card
     * @return \Illuminate\Http\Response
     */
    public function star(Request $request, Card $card)
    {
        $user = auth('lti')->user();

        if($request->get('action') == 'true'){
            $user->starred()->attach($card);
        }else{
            $user->starred()->detach($card);
        }

        return response()->json($card);
    }
}
