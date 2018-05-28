<?php

namespace Tonic\Http\Controllers;

use Cookie;

use Tonic\User;

use Illuminate\Http\Request;

class ImpersonateController extends Controller
{
    /**
     * Impersonate the given user.
     *
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function impersonate(User $user)
    {
        $original_user = auth()->user()->id;

        if ($user->id !== $original_user) {
            Cookie::queue(Cookie::make('original_user', $original_user, 2628000));

            auth()->login($user);
        }
        
        return redirect()->home();
    }

    /**
     * Revert to the original user.
     *
     * @return \Illuminate\Http\Response
     */
    public function revert()
    {
        auth()->loginUsingId(Cookie::get('original_user'));
        Cookie::queue(Cookie::forget('original_user'));
        
        return redirect()->home();
    }
}
