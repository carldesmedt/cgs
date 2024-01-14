<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Role;
use App\Actions\Admin\ReadCsv;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(Request $request){
        $user = Auth::user();
        if($user->id == 'QJH9'){
            return Inertia::render('Admin/Dashboard', [
                'users' => User::all(),
                'roles' => Role::all(),
            ]);
        }
        else{
            return Inertia::render('Dashboard');
        }
    }
    public function manage(Request $request){
        $user = Auth::user();
        if($user->id == 'QJH9'){
            
            return Inertia::render('Admin/ModelManagement', [
                'users' => Models\User::all(),
                'roles' => Models\Role::all(),
            ]);
        }
    }
    ///////////////////////////////////
    //////
    //////////////////////////////////
    public function read(Request $request, ReadCsv $csv){
        $data = $csv->readCsv();
        
        for($k=4; $k<100; $k++){
            $i = 0;
            if(str_starts_with($data[$k][0], 'netto')){
                break;
            }
            if(str_starts_with($data[$k][0], 'do')||str_starts_with($data[$k][0], 'Medewerker')||str_starts_with($data[$k][0], 'zaterdagwerker')||str_starts_with($data[$k][0], 'Jobstudent')|| empty($data[$k][0]))
            {
                continue;
            }
            else
            {
                foreach($data[2] as $t){
                    if(str_starts_with($t, 'Startuur')){
                        break;
                    }
                    if(str_starts_with($t, 'uren')||empty($t)||str_starts_with($t, 'NAAM')||str_starts_with($t, 'Ombu')||str_starts_with($t, 'Locatie')||str_starts_with($t, 'Taal')){
                        $i++;
                        continue;
                    }
                    else{
                        $explode = explode(' ', $data[$k][0]);
                        
                        $result[] = [$data[$k][0], $explode[0], $t, $data[$k][$i]];
                    }
                    $i++;
                } 
            }
            
        }
        dd($result);
    }
    /////////////////////////////////////////////
}
