<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index() {
        $product_types = ProductType::get();
        return view('admin.product.type.manage', compact('product_types'));
    }

    public function create() {
        return view('admin.product.type.add');
    }

    public function store(Request $request) {
        //return $request->all();
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required'
        ]);
        // insert
        $product_type = new ProductType();
        $product_type->name = $request->name;
        $product_type->description = $request->description;
        $product_type->status = $request->status;
        $product_type->save();
        return redirect()->route('product_type_manage')->with('message', 'Product type added successfully.');
    }

    public function edit(ProductType $product_type) {
        //return "ad";
        return view('admin.product.type.edit', compact('product_type'));
    }
    
    public function update(Request $request, ProductType $product_type) {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required'
        ]);
        // update
        $product_type->name = $request->name;
        $product_type->description = $request->description;
        $product_type->status = $request->status;
        $product_type->update();
        return redirect()->route('product_type_manage')->with('message', 'Product type updated successfully.');
    }

    public function delete(ProductType $product_type) {
        $product_type->delete();
        return redirect()->route('product_type_manage')->with('message', 'Product type deleted successfully.');
    }
}
