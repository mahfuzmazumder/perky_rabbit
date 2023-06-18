<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{
    public function index() {
        $product_units = ProductUnit::get();
        return view('admin.product.unit.manage', compact('product_units'));
    }

    public function create() {
        return view('admin.product.unit.add');
    }

    public function store(Request $request) {
        //return $request->all();
        $request->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);
        // insert
        $product_unit = new ProductUnit();
        $product_unit->name = $request->name;
        $product_unit->status = $request->status;
        $product_unit->save();
        return redirect()->route('product_units_manage')->with('message', 'Product unit added successfully.');
    }

    public function edit(ProductUnit $product_unit) {
        return view('admin.product.unit.edit', compact('product_unit'));
    }
    
    public function update(Request $request, ProductUnit $product_unit) {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);
        // update
        $product_unit->name = $request->name;
        $product_unit->status = $request->status;
        $product_unit->update();
        return redirect()->route('product_units_manage')->with('message', 'Product unit updated successfully.');
    }

    public function delete(ProductUnit $product_unit) {
        $product_unit->delete();
        return redirect()->route('product_units_manage')->with('message', 'Product unit deleted successfully.');
    }
}
