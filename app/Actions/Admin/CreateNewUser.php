<?php
namespace App\Actions\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateNewUser
{
    public function create(Request $request){
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'id' =>'required|max:4|unique:users',
            'email' => 'required|unique:users',
        ]);

        $user = User::create([
            'id' => $request->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make('laravel2024'),
        ]);
        return $user;
        /*$invitation = UserInvitation::create([
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'id' => $user->id,
            'email' => $user->email,
            'url' => URL::signedRoute('subscripe', ['user' => $user->id]);
        ]);*/
    }
}
