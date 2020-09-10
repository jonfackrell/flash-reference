<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.index');
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function features()
    {
        return view('web.features');
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function pricing()
    {
        return view('web.pricing');
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function learn()
    {
        return view('web.learn');
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('web.contact');
    }
}
