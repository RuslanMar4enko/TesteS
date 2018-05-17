<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colleague;

class ColleagueController extends Controller
{

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        if ($image) $filename = $this->imageFit($image);

        $colleague = new Colleague();
        $colleague->name = $request->name;
        $colleague->surname = $request->surname;
        $colleague->patronymic = $request->patronymic;
        $colleague->image = $filename;
        $colleague->sociability = $request->sociability;
        $colleague->engineering_skill = $request->engineering_skill;
        $colleague->time_management = $request->time_management;
        $colleague->lang = $request->lang;
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
        $colleague->projects()->sync($request->projects, 'id');
        return ['data' => $colleague];

    }

}
