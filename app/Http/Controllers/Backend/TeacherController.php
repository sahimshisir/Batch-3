<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\teacher;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = teacher::orderBy('id', 'asc')->get();
        return view('backend.pages.Teacher.manage', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new Slider instance
        $teacher = new teacher();
        $teacher->name = $request->name;
        $teacher->subtitle = $request->subtitle;
        $teacher->description = $request->description;
        $teacher->uplode_user_name = $request->username;

        // Handle the image upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $imgName = rand() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/img/teacher/' . $imgName);

                // Resize and save the image
                Image::make($image)->save($location);
                $teacher->image = $imgName;
            } catch (\Exception $e) {
                return response()->json(['error' => 'Image upload failed: ' . $e->getMessage()], 500);
            }
        }

        // Save the slider to the database
        $teacher->save();

        return response()->json([]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = teacher::find($id);
        if (!is_null($teacher)) {
          return view('backend.pages.Brand.edit', compact('teacher'));
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = teacher::find($id);
        $teacher->name = $request->name;
        $teacher->subtitle = $request->subtitle;
        $teacher->description = $request->description;
        $teacher->uplode_user_name = $request->username;

        // Handle the image upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $imgName = rand() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/img/teacher/' . $imgName);

                // Resize and save the image
                Image::make($image)->save($location);
                $teacher->image = $imgName;
            } catch (\Exception $e) {
                return response()->json(['error' => 'Image upload failed: ' . $e->getMessage()], 500);
            }
        }

        // Save the slider to the database
        $teacher->save();

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = teacher::findOrFail($id);
        $teacher->delete();
    
        return response()->json(['success' => 'Item deleted successfully.']);
        }
    }

