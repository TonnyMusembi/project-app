<?php

namespace App\Http\Controllers;
use App\Models\Program;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //
    public function index(){
        return Program::all();

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'program_id' => 'required',
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        } else {
            Program::create([
                'program_id' => $request->input('program_id'),
                'name' => $request->input('name'),
            ]);
        }
        return response()->json(['req' => $request]);

    }
    public function show(){


    }
    public function create(){
    }
public function destroy (){

    
}
}
