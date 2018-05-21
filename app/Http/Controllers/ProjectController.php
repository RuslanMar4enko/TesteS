<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Colleague;

class ProjectController extends Controller
{
    public function index(){
        return Project::all();
    }


    public function search(Request $request){


//       $search =  Colleague::where('name', $request->keywords)
       $search =  Colleague::orWhere('name', 'like', '%' . $request->keywords . '%')
           ->orWhere('surname', 'like', '%' . $request->keywords . '%')
            ->get();

       return response()->json($search);
    }
}