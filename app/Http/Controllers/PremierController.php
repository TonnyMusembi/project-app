<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Premier;

class PremierController extends Controller
{
public function index(){

    $premiers=Premier::all();
    return response()->json($premiers);
}
public function create(){

}
public function store(Request $request){
   // return response()->json([ '$dats']);

   $delivery = Premier::create($request->post());
   return response()->json([
       'message'=>'Category Created Successfully!!',
       'delivery'=>$delivery
   ]);

}
public function update(){

}
public function edit ($id){
    return response()->json ('$id');

}
public function destroy($id)
{
    $premier = Premier::find();
    $premier->delete;

    return response ()->json ([ '$data'=>201]);
}
 }
