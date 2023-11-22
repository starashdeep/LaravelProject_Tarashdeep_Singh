<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Guardian;
use App\Rules\TenDigitPhoneNumber;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::all();
        return view('children.index', compact('children'));
    }
    public function guardianindex()
    {
        $children = Child::with('guardian')->get();
        return view('children.guardianDetails', compact('children'));
    }

    public function create()
    {
        return view('children.create');
    }
    public function store(Request $request)
    {
        // Validate input for Child and Guardian
        $request->validate([
            'child_first_name' => 'required',
            'child_last_name' => 'required',
            'child_email_id' => 'required|email|unique:children,email_id',
            'guardian_first_name' => 'required',
            'guardian_last_name' => 'required',
            'phone_no' => ['required','string', new TenDigitPhoneNumber],
        ]);
        //Create the Guardian record and associate it with the Child
        $guardian = Guardian::create([
            'first_name' => $request->input('guardian_first_name'),
            'last_name' => $request->input('guardian_last_name'),
            'phone_no' => $request->input('phone_no'),
    ]);

    // Create the Child record
    $child = Child::create([
        'first_name' => $request->input('child_first_name'),
        'last_name' => $request->input('child_last_name'),
        'email_id' => $request->input('child_email_id'),
        'guardian_id' => $guardian->id,
    ]);
    
    dd($request->all());
    $child->guardian()->save($guardian);

    return redirect('/')->with('success', 'Child and guardian added successfully');
    }

    public function show($id)
    {
        $child = Child::with('guardian')->findOrFail($id);
        return view('children.show', compact('child'));
    }

    public function edit($id)
    {
        $child = Child::with('guardian')->findOrFail($id);
        return view('children.edit', compact('child'));
    }

    public function update(Request $request, $id)
    { 
        $child = Child::findOrFail($id);

        $child->first_name=$request->child_first_name;
        $child->last_name=$request->child_last_name;
        $child->email_id=$request->child_email_id;
        $child->save();
        
        $child->guardian->first_name = $request->guardian_first_name;
        $child->guardian->last_name = $request->guardian_last_name;
        $child->guardian->phone_no = $request->phone_no;
        $child->guardian->save();
        

        return redirect()->route('children.index', $id)->with('success', 'Child details updated!');
    }

    public function destroy($id)
    {
        $child = Child::with('guardian')->findOrFail($id);
        $child->delete();

        return redirect()->route('children.index')->with('success', 'Child and associated guardian deleted successfully');
    }
}
