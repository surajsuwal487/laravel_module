<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Illuminate\Support\Facades\File;
use Modules\Blog\Http\Requests\CategoryRequest;
use Modules\Blog\Http\Requests\CategoryUpdateRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        // passing through associative array to loop over in our UI 
        return view('blog::categories.index', compact('categories'));
    }


    public function create()
    {
        return view('blog::categories.create');
    }


    public function store(CategoryRequest $request)
    {
        //data
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('image_path')) {
            $category['image_path'] = time() . '-' . $request->name . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $category['image_path']);
        }

        $category = Category::create($data);
        return redirect()->back()->with('status', 'Categories Info Added Successfully');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('blog::categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        // $category = Category::findorfail($id);
        $category = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('image_path')) {
            $category['image_path'] = time() . '-' . $request->name . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $category['image_path']);
        }

        Category::where('id', $id)->update($category);

        return redirect()->back()->with('status', 'Categories Info Updated Successfully');
    }

    public function destory($id)
    {
        $category = Category::find($id);
        $destination = 'images/' . $category->image_path;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect()->back()->with('status', 'Categories Info Deleted Successfully Successfully');
    }
}
