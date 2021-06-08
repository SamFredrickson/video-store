<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        $this->authorize('create', User::class);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        
        if($request->params['form'] === 'new') $user->roles()->attach(3);
        if($request->params['form'] === 'old') $user->roles()->detach(3);

    }

    public function checkMail(Request $request)
    {
        $user = User::where( 'email', $request->input('email') )->first();

        return $user;
    }
}
