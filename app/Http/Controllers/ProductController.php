<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $products = Product::latest()->paginate(4);
       return view('product.index', compact('products'));
    }
    public function trashedProducts()
    {
     //$products = Product::withTrashed()->latest()->paginate(4);
        $products = Product::onlyTrashed()->latest()->paginate(4);
       return view('product.trash', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate ([
            'name'=>'required',
            'price'=>'required'
            ]); 
        $products= Product::create($request ->all());
        return redirect()->route('products.index')
         ->with('success','product added successfully') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Product $product)
    {
        return view('product.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Product $product )
    {
                return view('product.edit', compact('product'))  ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);

        $product->update($request->all());
         return redirect()->route('products.index')
         ->with('success','product updated successfully') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         $product->delete();
        return redirect()->route('products.index')
        ->with('success','product deleted successfully') ;
    }

    public function softDelete(  $id)
    {

        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
        ->with('success','product deleted successfully') ;
    }

    

   public function backFromSoftDelete(  $id)
    {


        $product = Product::onlyTrashed()->where('id' , $id)->first()->restore() ;
      

        return redirect()->route('products.index')
        ->with('success','product back successfully') ;
    }

public function  deleteForEver(  $id)
    {

        $product = Product::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('product.trash')
        ->with('success','product deleted successfully') ;
    }

    
}
