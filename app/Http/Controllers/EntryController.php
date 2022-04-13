<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Validator;


class EntryController extends Controller
{
    //
    public function index()
    {
        return Entry::all();
        //$entry = Entry::paginate(5);
    }

    public function store(Request $request)
    {
        //return response()->json(['$data']);
        $validator = Validator::make($request->all(), [
            'entry_id' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        } else {
            Entry::create([
                'entry_id' => $request->input('entry_id'),
                'status' => $request->input('status'),
            ]);
        }
        return response()->json(['req' => $request]);


    }
    public function show(Request $request){

    }
    public function destroy(Request $request){

        return response()->json(['$data']);
    }
}
