<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //

    public function index(){

        return Product::all();
        //return response()->json(['$data']);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'title' => 'required',
            'name'=>'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        }
        else {

            Product::create([
                'product_id' => $request->input('product_id'),
                'title' => $request->input('title'),
                'name'=>$request->input('name')
            ]);
        }
        return response()->json(['req' => $request]);
    }

    public function update($id){
    return response()->json(['$data']);

    }
    public function destroy ($id){
        $product = Product::find($id);
        if(!$product){
          return response()->json([
             'message'=>'Post Not Found.'
          ],404);
        }
        return response()->json(['$data']);
    }


}
