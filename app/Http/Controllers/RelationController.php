<?php

namespace App\Http\Controllers;
use App\Actions\Admin\CreateUserRoleRelation;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function createUserRole(Request $request, CreateUserRoleRelation $userRole){
        
        $relation = $userRole->create($request);
        dd($relation);
    }
}
