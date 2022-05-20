<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{

    public function index()
    {
        return Entry::all();
        //return response()->json ([]);
    }

    public function store(Request $request)
    {

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
    public function show(Request $request)
    {
        return response()->json();
    }
    public function create()
    {
        return response()->json();
        //view('create');
    }
    public function destroy(Request $request)
    {
        return response()->json(['$data']);
    }

    public function  delete()
    {
        return response()->json([]);
    }
    
}
