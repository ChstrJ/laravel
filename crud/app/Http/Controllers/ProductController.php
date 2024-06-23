<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at')->get();
        $search = $request->get('search');
        $perPage = 5;

        if (!empty($search)) {
            $products = Product::where('name', 'LIKE', "%$search%")
                ->orWhere('categories', 'LIKE', "%$search%")
                ->latest()
                ->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        return view('products.index', ['products' => $products])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'SmartTv' => 'SmartTv',
            'Phone' => 'Phone',
            'Gadgets' => 'Gadgets',
        ];
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        $fileName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
        }

        Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $fileName,
            'category' => $validatedData['category'],
            'quantity' => $validatedData['quantity'],
            'price' => $validatedData['price'],
        ]);

        return redirect()->route('products.index')->with('success', 'Product Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = [
            'SmartTv' => 'SmartTv',
            'Phone' => 'Phone',
            'Gadgets' => 'Gadgets',
        ];
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
