<?php

namespace App\Http\Controllers;
use App\Models\Category;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function browse($id = null)
   {
    if (!$id) {
        $categories = Category::whereNull('parent_id')->get();
        return view('category', compact('categories'));
    }

    $category = Category::with(['children', 'Product'])->findOrFail($id);

    if ($category->children->count() > 0) {
        return view('category_child', [
            'parentCategory' => $category,
            'categories' => $category->children
        ]);
    }
    else{
        return view('category_product', [
            'category' => $category,
            'products' => $category->Product
        ]);

    }

}

}
