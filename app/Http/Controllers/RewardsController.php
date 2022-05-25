<?php

namespace App\Http\Controllers;

use App\Models\Rewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RewardsController extends Controller
{
    //
    public function index(){
        return Rewards::all();
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'entry_id' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        }
        else {
            Rewards::create([
                'entry_id' => $request->input('entry_id'),
                'status' => $request->input('status'),
            ]);
        }
    return response()->json(['req' => $request]);

    }

    public function create(){
        return response()->json();
    }
    public function destroy(Request $request){
        return response()->json(['$data']);
    }

}
