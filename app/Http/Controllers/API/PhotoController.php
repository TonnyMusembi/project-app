<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Validator;
use Illuminate\Support\Facades\Validator;

use App\Models\Photo;
use App\Http\Resources\PhotoResource;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Photo::latest()->get();
        return response()->json([PhotoResource::collection($data), 'Programs fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'desc' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $photo = Photo::create([
            'name' => $request->name,
            'desc' => $request->desc
         ]);

        return response()->json(['Program created successfully.', new PhotoResource($photo)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        if (is_null($photo)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new PhotoResource($photo)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo )
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'desc' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $photo->name = $request->name;
        $photo->desc = $request->desc;
        $photo->save();

        return response()->json(['Program updated successfully.', new PhotoResource($photo)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo ,$id)
    {

        $photo =Photo::find($id);
        $photo->delete();

        //return response()->json('Photo deleted successfully');
        return response() ->json ('Photo deleted');

    }
}
