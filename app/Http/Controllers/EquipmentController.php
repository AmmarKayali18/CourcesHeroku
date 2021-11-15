<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function allEquipments()
    {
       $equipments =  Equipment::all();
       return view('admin.equipments', compact('equipments'));
    }

    public function details($id)
    {
        return Equipment::where('id', $id)->first();
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'file' => 'required',
            'count' => 'required',
        ]);
        $obj = [];
        $obj['name'] = $request->get('name_ar');
        $obj['description'] = $request->get('description_ar');
        $request->merge(['ar' => $obj]);

        $obj['name'] = $request->get('name_en');
        $obj['description'] = $request->get('description_en');
        $request->merge(['en' => $obj]);

        if ($request->hasFile('file')) {
            $image = $request->file("file");
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'images/equipments';
            $request["file"]->move($path, $file_name);

            $request->merge(['image_path' => url('/') . "/images/equipments/" . $file_name]);
        }

        Equipment::create($request->all());


        return ['message' =>  __('trans.add_equipment')];
    }

    public function update(Request $request)
    {
        $request->validate([
            'Id' => 'required',
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'count' => 'required',

        ]);

        $obj = [];
        $obj['name'] = $request->get('name_ar');
        $obj['description'] = $request->get('description_ar');
        $request->merge(['ar' => $obj]);

        $obj['name'] = $request->get('name_en');
        $obj['description'] = $request->get('description_en');
        $request->merge(['en' => $obj]);


        if ($request->hasFile('file')) {
            $image = $request->file("file");
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;

            $type = $request->get('type');
            $path = 'images/equipments';
            $request["file"]->move($path, $file_name);


            $request->merge(['image_path' => url('/') . "/images/equipments/" . $file_name]);
        }
        $Id = $request->get('Id');

        Equipment::find($Id)->fill($request->all())->save();

        return ['message' =>  __('trans.update_equipment')];
    }
}
