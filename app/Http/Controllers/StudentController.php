<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
//use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return Student::all();
        $student = Student::all();
        return view('index', compact('student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $createStudent = $request->validate();
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // display students
        // $storeData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'phone' => 'required|numeric',
        //     'password' => 'required|max:255',
        // ]);
        // $student = Student::create($storeData);
        // return redirect('/students')->with('completed', 'Student has been saved!');

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        } else {

            Student::create([
                'id' => $request->input('id'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => $request->input('password')
            ]);
        }
        return response()->json(['req' => $request]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['$data']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
       return response()->json(['$data']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $frontend = $request->frontend;
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
        Student::whereId($id)->update($updateData);
        return redirect('/students')->with('completed', 'Student has been updated');
        //return response()->json()(['status' => 201]);
        //Cannot have two returns on the same,it picks the first one
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        //return redirect('/students')->with('completed', 'Student has been deleted');
        return response()->json(['status' => 201,]);
    }
}
