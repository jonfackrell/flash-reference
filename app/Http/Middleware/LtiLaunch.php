<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class LtiLaunch
{

    use SendsPasswordResetEmails;

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

                    $user = User::login('lti');

                    if($user->wasRecentlyCreated){
                        $this->sendResetLinkEmail((new Request())->replace([
                            'email' => $user->email,
                        ]));
                    }

                    $institution = $user->addToInstitution();

                }else{

                    return abort(403, $lti->message);
                }

            }else{

                return abort(403, __('Missing LTI Consumer Key'));
            }

        }

        return $next($request);
    }
}
