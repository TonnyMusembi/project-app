<?php

namespace App\Http\Controllers;
use App\Models\Phone;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PhoneController extends Controller
{

    public function index(){
        return Phone::all();
//return response()->json();
    }


public function store(Request $request){

    $validator = Validator::make($request->all(), [
        'phone_id' => 'required',
        'title'  => 'required',
    ]);
    if ($validator->fails()) {
        return response()->json(['status' => 422, 'errors' => $validator->errors()]);
    }
    else {

        Phone::create([
            'phone_id' => $request->input('phone_id'),
            'title' => $request->input('title'),
        ]);
    }
    return response()->json(['req' => $request]);

}

public function create(Request $request){

   return view('');
}

public function destroy(Request $request){

    


}

}

