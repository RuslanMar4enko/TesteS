<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colleague;

class ColleagueController extends Controller
{

    public function index(Request $request){
        $colleague = Colleague::with('projects')->latest()->get();
       return['data'=>$colleague];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'patronymic' => 'required|max:255',
        ]);

        $image = $request->file('image');

        if ($image) $filename = $this->imageFit($image);
        else $filename = 'uploads/Screenshot from 2018-05-14 16-52-02.png';

        $colleague = new Colleague();
        $colleague->name = $request->name;
        $colleague->surname = $request->surname;
        $colleague->patronymic = $request->patronymic;
        $colleague->image = $filename;
        $colleague->sociability = (int) $request->sociability;
        $colleague->engineering_skill = (int) $request->engineering_skill;
        $colleague->time_management = (int) $request->time_management;
        $colleague->lang = (int) $request->lang;
        $colleague->save();

        return ['data' => $colleague];
    }


    /**
     * @param $id
     * @return array
     */

    public function show($id)
    {
        $colleague = Colleague::findOrFail($id);
        if (!$colleague) abort(404);

        return ['data' => $colleague];
    }

    /**
     * @param $id
     * @param Request $request
     * @return array
     */
    public function addProject($id, Request $request)
    {
        $colleague = Colleague::findOrFail($id);
        $colleague->projects()->sync($request->all(), 'id');
        return ['data' => $colleague];

    }


}
