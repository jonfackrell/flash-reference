<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LtiConfigController extends Controller
{
    public function __invoke()
    {
        $content = view('lti.config');

        return response($content, 200)
                    ->header('Content-Type', 'text/xml');
    }
}
