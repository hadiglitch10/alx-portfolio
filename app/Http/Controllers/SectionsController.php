<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the sections resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = sections::all(); // Retrieve all sections from the database
        return view('sections.sections', compact('sections')); // Return the sections view with data
    }

    /**
     * Show the form for creating a new section resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the form for creating a new section
    }

    /**
     * Store a newly created section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
        ], [
            'section_name.required' => 'يرجي ادخال اسم القسم', // Custom message for required field
            'section_name.unique' => 'اسم القسم مسجل مسبقا', // Custom message for unique field
        ]);

        // Create a new section with validated data
        sections::create([
            'section_name' => $request->section_name,
            'description' => $request->description,
            'Created_by' => Auth::user()->name, // Get the name of the authenticated user
        ]);

        session()->flash('Add', 'تم اضافة القسم بنجاح '); // Flash message for successful addition
        return redirect('/sections'); // Redirect to sections index
    }

    /**
     * Display the specified section resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        // Show the specified section
    }

    /**
     * Show the form for editing the specified section resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        // Show the form for editing the specified section
    }

    /**
     * Update the specified section resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id; // Get the section ID from the request

        // Validate the incoming request data
        $this->validate($request, [
            'section_name' => 'required|max:255|unique:sections,section_name,' . $id, // Exclude current section from unique check
            'description' => 'required', // Validate description
        ], [
            'section_name.required' => 'يرجي ادخال اسم القسم', // Custom message for required field
            'section_name.unique' => 'اسم القسم مسجل مسبقا', // Custom message for unique field
            'description.required' => 'يرجي ادخال البيان', // Custom message for required description
        ]);

        $sections = sections::find($id); // Find the section by ID
        $sections->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);

        session()->flash('edit', 'تم تعديل القسم بنجاح'); // Flash message for successful update
        return redirect('/sections'); // Redirect to sections index
    }

    /**
     * Remove the specified section resource from storage.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id; // Get the section ID from the request
        sections::find($id)->delete(); // Find and delete the section
        session()->flash('delete', 'تم حذف القسم بنجاح'); // Flash message for successful deletion
        return redirect('/sections'); // Redirect to sections index
    }
}
