<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('type')->get();
        return view('admin.product.manage', compact('products'));
    }

    public function create() {
        $product_types = ProductType::where('status', 1)->get();
        $product_units = ProductUnit::where('status', 1)->get();
        return view('admin.product.add', compact('product_types', 'product_units'));
    }

    public function store(Request $request) {
        //return $request->all();
        $request->validate([
            'product_unit_id' => 'required',
            'product_type_id' => 'required',
            'product_name' => 'required',
            'unit_price' => 'required',
            'sale_price' => 'nullable',
            'product_description' => 'nullable|string',
            'thumbnail' => 'nullable|image',
            'status' => 'required'
        ]);
        // insert
        $product = new Product();
        $product->product_unit_id = $request->product_unit_id;
        $product->product_type_id = $request->product_type_id;
        $product->product_name = $request->product_name;
        $product->unit_price = $request->unit_price;
        $product->sale_price = $request->sale_price;
        $product->product_description = $request->product_description;
        $product->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $product->thumbnail = $this->fileUpload($request->thumbnail, 'public/img/upload/product/', 200, 200);
         }

        $product->save();
        return redirect()->route('product_manage')->with('message', 'Product added successfully.');
    }

    public function edit(Product $product) {
        //return "ad";
        $product_types = ProductType::where('status', 1)->get();
        $product_units = ProductUnit::where('status', 1)->get();
        return view('admin.product.edit', compact('product', 'product_types', 'product_units'));
    }
    
    public function update(Request $request, Product $product) {
        $request->validate([
            'product_unit_id' => 'required',
            'product_type_id' => 'required',
            'product_name' => 'required',
            'unit_price' => 'required',
            'sale_price' => 'nullable',
            'product_description' => 'nullable|string',
            'thumbnail' => 'nullable|image',
            'status' => 'required'
        ]);
        // update
        $product->product_unit_id = $request->product_unit_id;
        $product->product_type_id = $request->product_type_id;
        $product->product_name = $request->product_name;
        $product->unit_price = $request->unit_price;
        $product->sale_price = $request->sale_price;
        $product->product_description = $request->product_description;
        $product->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $product->thumbnail = $this->fileUpload($request->thumbnail, 'public/img/upload/product/', 200, 200);
         }

        $product->update();
        return redirect()->route('product_manage')->with('message', 'Product updated successfully.');
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect()->route('product_manage')->with('message', 'Product deleted successfully.');
    }

    public function get_product_info(Request $request) {
        $product_id = $request->id;
        $product = Product::where('id', $product_id)->first();
        //$product = Product::where('id', 1)->first();
        return response()->json(['product' => $product, 'quantity' => $product->quantity()]);
        //return $product->quantity();
    }
}
