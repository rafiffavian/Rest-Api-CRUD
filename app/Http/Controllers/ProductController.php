<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;

class ProductController extends Controller
{
    public function createData(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'price' => 'required|numeric',
            'desc_product' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->desc_product
        ]);

        return response()->json([
            'message' => 'success create data'
        ]);
    }

    public function getAllData()
    {
        $product = Product::all();
        return response()->json([
            'product' => $product
        ]);
    }

    public function getData($id)
    {
        // $product = Product::all();
        $products = Product::findOrFail($id);
        // return response()->json($product);
        return response()->json($products);

    }

    public function searchData(Request $request)
    {
        $product = Product::where('name','LIKE','%'. $request->cari .'%')
                            ->Orwhere('price', 'LIKE','%' . $request->cari .'%')
                            ->Orwhere('description', 'LIKE', '%' . $request->cari . '%')
                            ->get();
        return response()->json([
            'productSearch' => $product
        ]);
    }
    public function updateData(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'product_name' => 'required',
            'price' => 'required|numeric',
            'desc_product' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->desc_product
        ]);
        return response()->json([
            'message' => 'success update data'
        ]);
    }

    public function deleteData($id)
    {
        Product::destroy($id);
        return response()->json([
            'message' => 'success delete data'
        ]);
    }
}
