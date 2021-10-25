<?php

namespace App\Http\Controllers;

use App\Models\ClassHall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function allHalls()
    {
       $classes =  ClassHall::all();
       return view('admin.classes', compact('classes'));
    }

    public function details($id)
    {
        return ClassHall::where('id', $id)->first();
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'count_chairs' => 'required',
        ]);
        $obj = [];
        $obj['name'] = $request->get('name_ar');
        $request->merge(['ar' => $obj]);

        $obj['name'] = $request->get('name_en');
        $request->merge(['en' => $obj]);

      
        ClassHall::create($request->all());


        return ['message' =>  __('trans.add_class')];
    }

    public function update(Request $request)
    {
        $request->validate([
            'Id' => 'required',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'count_chairs' => 'required',
        ]);

        $obj = [];
        $obj['name'] = $request->get('name_ar');
        $obj['description'] = $request->get('description_ar');
        $request->merge(['ar' => $obj]);

        $obj['name'] = $request->get('name_en');
        $obj['description'] = $request->get('description_en');
        $request->merge(['en' => $obj]);

        $Id = $request->get('Id');

        ClassHall::find($Id)->fill($request->all())->save();

        return ['message' =>  __('trans.update_class')];
    }
}
