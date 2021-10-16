<?php

namespace Laravel\Fortify\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class ProfileInformationController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UpdatesUserProfileInformation $updater)
    {
        // $updater->update($request->user(), $request->all());
        
        $updater->update($request,[
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email

        ]);

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'profile-information-updated');
    }
}
