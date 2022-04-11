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
                'transaction_id' => $request->input('transaction_id'),
                'amount' => $request->input('amount'),
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
