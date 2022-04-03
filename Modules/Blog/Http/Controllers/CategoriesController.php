<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Illuminate\Support\Facades\File;
use Modules\Blog\Http\Requests\CategoryRequest;
use Modules\Blog\Http\Requests\CategoryUpdateRequest;
use Modules\Blog\Repository\CategoryRepository;

class CategoriesController extends Controller
{


    private $CategoryRepository;
    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }


    public function index()
    {
        $categories = $this->CategoryRepository->index();
        // $categories = Category::all();
        return view('blog::categories.index', compact('categories'));
    }


    public function create()
    {
        return view('blog::categories.create');
    }


    public function store(CategoryRequest $request)
    {

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('image_path')) {
            $data['image_path'] = time() . '-' . $request->name . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $data['image_path']);
        }

        $this->CategoryRepository->store($data);
        // Category::create($data);
        return redirect()->back()->with('status', 'Categories Info Added Successfully');
    }


    public function edit($id)
    {
        $category = $this->CategoryRepository->edit($id);
        // $category = Category::find($id);
        return view('blog::categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        // $category = Category::findorfail($id);
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('image_path')) {
            $category['image_path'] = time() . '-' . $request->name . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $category['image_path']);
        }

        Category::where('id', $id)->update($data);

        return redirect()->back()->with('status', 'Categories Info Updated Successfully');
    }

    public function destory($id)
    {
        $category = Category::find($id);
        $destination = 'images/' . $category->image_path;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $this->CategoryRepository->destory($id);
        return redirect()->back()->with('status', 'Categories Info Deleted Successfully Successfully');
    }
}
