<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class CategoryController extends Controller
{
    //
    public function create () 
    {
        return view('productcreate');
    }
    public function store(Request $request)
{
    $request->validate([
        'category' => 'required|string',
        'product'  => 'required|string',
        'price'    => 'required|integer',
    ]);

    $category = Category::create([
        'name' => $request->category,
    ]);

    $product = Product::create([
        'name'        => $request->product,
        'price'       => $request->price,
        'category_id' => $category->id,

    ]);

    return redirect()->back()->with('success', 'Saved successfully');
}

    public function index()
{
    $categories = Category::with('products')->get();
    return view('productlist', compact('categories'));
}



///the final we edite those

    public function edit(Product $product)
    {
        return view('product_edit',compact('product'));
    }

        public function update (Request $request , Product $product)
        {
            $request->validate([
                'product'  => 'required|string',
                'price'    => 'required|integer',
            ]);
            $product->update([
                'name'=>$request->product,
                'price'=>$request->price,
            ]);
            return redirect('/products')->with('success','done');
        }
        /// the final means delete 
        public function delete (Product $product){
            $product->delete();
            return redirect('/products')->with('success','deleted');
        }

}
