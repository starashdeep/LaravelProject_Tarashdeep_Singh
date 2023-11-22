<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Book;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::all();

        // Check if there are no libraries or if the libraries don't have any books
        if ($libraries->isEmpty() || $libraries->pluck('book')->flatten()->isEmpty()) {
            // Set a flash message
            session()->flash('empty_library', 'This library is empty.');
        }

        return view('libraries.index', compact('libraries'));
    }

    public function bookindex()
    {
        $libraries = library::with('book')->get();
        return view('librari.bookDetails', compact('libraries'));
    }

    public function create()
    {
        return view('libraries.create');
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'library_name' => 'required',
            'library_owner' => 'required',
            'library_address' => 'required',
            'phone_no' => 'required',
        ]);

        $library = Library::create([
            'name' => $request->input('library_name'),
            'owner' => $request->input('library_owner'),
            'address' => $request->input('library_address'),
            'phone_no' => $request->input('phone_no'),
        ]);
        $libraryName=$library->name;

        return redirect('/')->with('success', "$libraryName added successfully!");

    }

    public function show($id)
    {
        $library = Library::with('book')->findOrFail($id);
        $books=$library->book;
        return view('libraries.show', compact('library','books'));
    }

    public function edit($id)
    {
        $library = Library::with('book')->findOrFail($id);
        return view('libraries.edit', compact('library'));
    }

    public function update(Request $request, $id)
    {  
        $request->validate([
            'library_name' => 'required',
            'library_owner' => 'required',
            'library_address' => 'required',
            'library_phone_no' => 'required',
        ]);
        // dd($request->all());
        $library = Library::findOrFail($id);
        // dd($library);
        $library->name=$request->library_name;
        $library->owner=$request->library_owner;
        $library->phone_no=$request->library_phone_no;
        $library->address=$request->library_address;
        $library->save();
        $libraryName=$library->name;

        return redirect()->route('libraries.index', $id)->with('success', "$libraryName details updated!");
    }

    public function destroy($id)
    {
        $library = Library::with('book')->findOrFail($id);
        $library->delete();
        $message='';
        if($library->book->isEmpty()){
            session()->flash('Empty Library', true); 
        }
        $libraryName=$library->name;

        return redirect()->route('libraries.index')->with('success', "$libraryName deleted successfully!");
    }

}
