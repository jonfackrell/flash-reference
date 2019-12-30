<?php

namespace App\Http\Middleware;

use Closure;

class LtiLaunch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->get('lti_version') == 'LTI-1p0'){
            // Canvas is not sending this info: $request->get('lti_message_type') == 'basic-lti-launch-request' &&
            if($request->has('oauth_consumer_key')){
                // Canvas is not passing this info:  && $request->has('resource_link_id')
                $lti = new \BLTI($request->get('oauth_consumer_key'), false, false);

                if ($lti->valid) {

                    dd('Success!!');

                }else{
                    // dd($request->server());
                    return abort(403, $lti->message);
                }

            }else{

                return 'Invalid 2';
            }

        }else{

            return 'Invalid 1';
        }


        return $next($request);
    }
}
