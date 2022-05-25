<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    //
    public function index(){
  return Event::all();

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'status' => 'required',
            'name'  =>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        } else {
            Event::create([
                'event_id' => $request->input('event_id'),
                'status' => $request->input('status'),
                'name'=> $request->input('name'),
            ]);
        }
        return response()->json(['req' => $request]);
    }
    public function show(){

    }


}
