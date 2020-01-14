<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LtiLaunchController extends Controller
{
    public function __invoke(Request $request)
    {

        if($request->get('lti_version') == 'LTI-1p0'){
            // Canvas is not sending this info: $request->get('lti_message_type') == 'basic-lti-launch-request' &&
            if($request->has('oauth_consumer_key')){
                // Canvas is not passing this info:  && $request->has('resource_link_id')
                $lti = new \BLTI($request->get('oauth_consumer_key'), false, false);

                if ($lti->valid) {

                    $user = User::login();
                    $institution = $user->addToInstitution();

                    if($user->isInstructor()){
                        return redirect()->route('lti.instructor.index', [
                            'institution' => $institution
                        ]);
                    }else{
                        return redirect()->route('lti.student.index', [
                            'institution' => $institution
                        ]);
                    }

                }else{
                    // dd($request->server());
                    return abort(403, __($lti->message));
                }

            }else{

                abort(401, __('The LTI tool has not been correctly configured with a Consumer Key and Secret'));
            }

        }else{
            abort(406, 'LTI version is not supported');
        }

    }
}
