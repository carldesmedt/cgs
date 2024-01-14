<?php
namespace App\Actions\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class CreateUserRoleRelation 
{
    public function create(Request $request){
        $validated = $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);
        $user = User::find($request->user_id);
        $user->roles()->sync([$request->role_id]);
        //$relation = User::find($request->user_id)->roles()->attach([$request->role_id]);
        return $user->roles;
    }
}