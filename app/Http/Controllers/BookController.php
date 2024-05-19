<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json([
            'status' => true,
            'books' => $books
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Book created successfully!',
            'book' => $book
        ]);
    }

    public function show(Request $request)
    {
        $book = Book::find($request->id);

        if (is_null($book)) {
            return response()->json([
                'status' => false,
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'book' => $book
        ]);
    }

    public function update(StoreBookRequest $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->isbn = $request->input('isbn');
        $book->value = $request->input('value');
        $book->save();

        return response()->json([
            'status' => true,
            'message' => 'Book updated successfully',
            'book' => $book
        ]);
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();

        return response()->json([
            'status' => true,
            'message' => 'Book deleted successfully',
        ]);
    }
}
