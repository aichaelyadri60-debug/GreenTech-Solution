<?php

namespace App\Http\Controllers;

use App\Models\Favorie;
use Illuminate\Http\Request;
use App\Models\Product;


class FavorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =auth()->user();
        if(!$user){
            return redirect()->route('login');
        }
        $products =$user->favorites;
        return view('favorie' ,compact('products'));
    }



    public function toggle(Product $product){
        $user =auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        $user->favorites()->toggle($product->id);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorie $favorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorie $favorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorie $favorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorie $favorie)
    {
        //
    }
}
