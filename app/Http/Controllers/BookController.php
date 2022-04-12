<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(Request $request)
    {
        //$books = Book::all();
        //return response()->json('$data');
        return Book::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required',
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        } else {

            Book::create([
                'book_id' => $request->input('book_id'),
                'title' => $request->input('title'),
            ]);
        }
        return response()->json(['req' => $request]);;
    }
    public function show($id)
    {
        $book = Book::find($id);
        if (!empty($book)) {
            return response()->json($book);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->name = is_null($request->name) ? $book->name : $request->name;
            $book->author = is_null($request->author) ? $book->author : $request->author;
            $book->publish_date = is_null($request->publish_date) ? $book->publish_date : $request->publish_date;
            $book->save();
            return response()->json([
                "message" => "Book Updated."
            ], 404);
        } else {
            return response()->json([
                "message" => "Book Not Found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->delete();

            return response()->json([
                "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
                "message" => "book not found."
            ], 404);
        }
    }
}
