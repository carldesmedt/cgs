<?php
namespace App\Actions\Admin;

use App\Models\Role;
use Illuminate\Http\Request;

class CreateNewRole 
{
    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
            'description' => 'required',
        ]);

        return Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }
}