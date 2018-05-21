<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Colleague;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }


    public function search(Request $request)
    {

        $search = Colleague::orWhere('name', 'like', '%' . $request->keywords . '%')
            ->orWhere('surname', 'like', '%' . $request->keywords . '%')
            ->orWhere('patronymic', 'like', '%' . $request->keywords . '%')
            ->get();

        return response()->json($search);
    }

    public function avg()
    {
        $colleague = Colleague::all();
        $sociability = $colleague->avg('sociability');
        $engineering_skill = $colleague->avg('engineering_skill');
        $time_management = $colleague->avg('time_management');
        $lang = $colleague->avg('lang');
        $result = [
            'sociability' => $sociability,
            'engineering_skill' => $engineering_skill,
            'time_management' => $time_management,
            'lang' => $lang
        ];

        return $result;
    }
}