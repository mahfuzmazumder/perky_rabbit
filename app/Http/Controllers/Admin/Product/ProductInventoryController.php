<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductInventoryController extends Controller
{
    public function index() {
        $product_units = Inventory::get();
        return view('admin.product.unit.manage', compact('product_units'));
    }

    public function create() {
        $product_types = ProductType::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('admin.product.inventory.add', compact('product_types', 'products'));
    }

    public function store(Request $request) {
        //return $request->all();
        $request->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);
        // insert
        $product_unit = new Inventory();
        $product_unit->name = $request->name;
        $product_unit->status = $request->status;
        $product_unit->save();
        return redirect()->route('product_units_manage')->with('message', 'Product unit added successfully.');
    }

    public function edit(Inventory $product_unit) {
        return view('admin.product.unit.edit', compact('product_unit'));
    }
    
    public function update(Request $request, Inventory $product_unit) {
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

    public function delete(Inventory $product_unit) {
        $product_unit->delete();
        return redirect()->route('product_units_manage')->with('message', 'Product unit deleted successfully.');
    }
}
