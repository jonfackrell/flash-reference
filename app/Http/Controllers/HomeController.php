<?php

namespace App\Http\Controllers;

use App\Course;
use App\Set;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = user();
        if(in_array('Student', $user->roles) && !in_array('Instructor', $user->roles)){
            return view('app.student.home', [
                'user' => $user,
                'sets' => $user->recentSets,
            ]);
        }else{
            $user->load('courses');
            $user->load('sets');

            return view('app.instructor.home', [
                'user' => $user,
                'sets' => $user->recentSets,
            ]);
        }

    }

    /**
     * Show search results.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $user = user();

        $sets = Set::where('user_id', $user->id)
                        ->where('name', 'LIKE', '%'.$request->get('q').'%')
                        ->get();

        $courses = Course::where('user_id', $user->id)
                        ->where('name', 'LIKE', '%'.$request->get('q').'%')
                        ->get();

        return view('search', [
            'user' => $user,
            'sets' => $sets,
            'courses' => $courses,
        ]);
    }
}
