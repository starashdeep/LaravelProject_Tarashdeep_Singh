<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Book;


class BookController extends Controller
{
    public function create()
    {
        $libraries=Library::all();
        return view('libraries.bookCreate', compact('libraries'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'book_name' => 'required',
            'book_total_pages' => 'required',
        ]);
        
        // Create a new Book 
        $book=Book::create([
            'name' => $request->input('book_name'),
            'total_pages' => $request->input('book_total_pages'),
            'library_id' => $request->input('library_id'),
        ]);
        $library_id=$book->library->id;
        $bookName=$book->name;
        // Redirect back 
        return redirect()->route('libraries.show', $library_id)->with('success', "$bookName added successfully!");
    }

    public function edit(Book $book)
    {
        $libraries=Library::all();
        return view('libraries.bookEdit', compact('book', 'libraries'));
    }

    public function update(Request $request, Book $book)
    {  
        $request->validate([
            'book_name' => 'required',
            'book_total_pages' => 'required',
        ]);
        
        $book->name=$request->book_name;
        $book->total_pages=$request->book_total_pages;
        $book->library_id=$request->library_id;
        $book->save();
        $bookName=$book->name;
        $library_id=$book->library->id;

        return redirect()->route('libraries.show', $library_id)->with('success', "$bookName book details updated!");
    }

    public function destroy(Book $book)
    {
        $book->delete();
        $library_id=$book->library->id;
        $bookName=$book->name;
        return redirect()->route('libraries.show', $library_id)->with('success', "$bookName deleted successfully!");
    }
}
