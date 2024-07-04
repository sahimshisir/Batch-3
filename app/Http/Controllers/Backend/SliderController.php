<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'asc')->get();
    return view('backend.pages.Slider.manage', compact('sliders'));
      
    }

    public function create()
    {
        return view('backend.pages.Slider.creat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new Slider instance
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->discription = $request->description;
        $slider->uplode_user_name = $request->username;

        // Handle the image upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $imgName = rand() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/img/slider/' . $imgName);

                // Resize and save the image
                Image::make($image)->save($location);
                $slider->image = $imgName;
            } catch (\Exception $e) {
                return response()->json(['error' => 'Image upload failed: ' . $e->getMessage()], 500);
            }
        }

        // Save the slider to the database
        $slider->save();

        return response()->json([]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementation for displaying a single slider
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)) {
          return view('backend.pages.Brand.edit', compact('slider'));
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        // Create a new Slider instance
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->discription = $request->description;
        $slider->uplode_user_name = $request->username;

        // Handle the image upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $imgName = rand() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/img/slider/' . $imgName);

                // Resize and save the image
                Image::make($image)->save($location);
                $slider->image = $imgName;
            } catch (\Exception $e) {
                return response()->json(['error' => 'Image upload failed: ' . $e->getMessage()], 500);
            }
        }

        // Save the slider to the database
        $slider->save();

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
    $slider->delete();

    return response()->json(['success' => 'Item deleted successfully.']);
    }
}
?>
