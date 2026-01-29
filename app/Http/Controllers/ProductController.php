<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{

   
    $products = Product::orderBy('created_at', 'desc')->paginate(5);

    if ($request->ajax()) {
        return view('products._table', compact('products'))->render();
    }

    return view('dashboard', [
        'products' => $products,
        'totalProducts' => Product::count(),
        'totalStock' => Product::sum('stock'),
        'categories' => Product::distinct('category_id')->count('category_id'),
        'lowStock' => Product::where('stock', '<=', 10)->count(),
    ]);
}


public function catalog(Request $request)
{
    $query = Product::query();


    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }


    if ($request->sort == 'price_asc') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort == 'price_desc') {
        $query->orderBy('price', 'desc');
    } elseif ($request->sort == 'name_asc') {
        $query->orderBy('name', 'asc');
    } else {
        $query->orderBy('created_at', 'desc');
    }

    $products = $query->paginate(6)->withQueryString();

    return view('catalog', [
        'products' => $products,
        'totalProducts' => Product::count(),
    ]);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addproducts');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item =new Product();
        $item->name =$request->name;
        $item->description =$request->description;
        $item->price =$request->price;
        $item->stock =$request->stock;
        $item->category_id =$request->category_id;
        $item->save();
        return redirect()
        ->back()
        ->with('success','produit creer avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item =Product::findOrFail($id);
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item =Product::findOrfail($id);
        return view('editProduct',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item =Product::findOrFail($id);
        $item->name =$request->name;
        $item->description =$request->description;
        $item->price =$request->price;
        $item->stock =$request->stock;
        $item->category_id =$request->category_id;
        $item->update();
        return redirect()
        ->back()
        ->with('success', 'produits modifier avec seccuess');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item =Product::findOrFail($id);
        $item->delete();
        return "delete successfuly";
    }
}
