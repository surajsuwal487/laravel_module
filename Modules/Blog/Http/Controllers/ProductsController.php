<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Product;
use Modules\Blog\Http\Requests\ProductRequest;
use Modules\Blog\Repository\ProductRepository;

class ProductsController extends Controller
{

    private $ProductRepository;
    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }


    public function index()
    {
        $products = $this->ProductRepository->index();
        // $products = Product::latest()->with('catWithProduct')->get();
        return view('blog::products.index', compact('products'));
    }


    public function create()
    {
        // $categories = $this->ProductRepository->create()
        $categories = Category::all();
        return view('blog::products.create', compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
        ];
        $this->ProductRepository->store($data);
        // $product = Product::create($product);
        return redirect()->back()->with('status', 'Product Info Added Successfully');
    }


    public function edit($id)
    {
        $categories = Category::all();
        // $product = Product::find($id);
        $product = $this->ProductRepository->edit($id);
        return view('blog::products.edit', compact('categories'), compact('product'));

        // return view('blog::products.edit', compact('product'));
        // return view()
    }

    public function update(ProductRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
        ];
        Product::where('id', $id)->update($data);

        return redirect()->back()->with('status', 'Product Info Updated Successfully');
    }

    public function destory($id)
    {
        // $product = Product::find($id);
        $this->ProductRepository->destory($id);
        // $product->delete();
        return redirect()->back()->with('status', 'Product Info Deleted Successfully');
    }
}
