<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $teachers = User::where('type','teacher')->get();
        return view('courses', compact('teachers'));
    }

    public function categories()
    {
        $categories = CourseCategory::all();
        return view('admin.category_courses', compact('categories'));
    }

    public function details($id)
    {
        return CourseCategory::where('id', $id)->first();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'file' => 'required',

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
            $path = 'images/categories';
            $request["file"]->move($path, $file_name);

            $request->merge(['image_path' => url('/') . "/images/categories/" . $file_name]);
        }

        CourseCategory::create($request->all());


        return ['message' =>  __('trans.add_category')];
    }


    public function update(Request $request)
    {
        $request->validate([
            'Id' => 'required',
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',

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
            $path = 'images/categories';
            $request["file"]->move($path, $file_name);


            $request->merge(['image_path' => url('/') . "/images/categories/" . $file_name]);
        }
        $Id = $request->get('Id');

        CourseCategory::find($Id)->fill($request->all())->save();

        return ['message' =>  __('trans.update_category')];
    }
}
