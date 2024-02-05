<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Import the Menu model
use App\Models\Slider; // Import the Slider model
use Illuminate\Support\Facades\Validator;
class SliderController extends Controller
{
    public function manageSlider()
    {
        $data = [
            'pageTitle' => 'Manage Slider',
            'sliders' => Slider::where('is_deleted', 'n')->paginate(3), // You can adjust the number of items per page as needed
        ];
       return view('backend.slider.manageSlider',$data);        
    }//End manageSlider function
    public function addSlider()
    {        
        $data = [
            'pageTitle' => 'Add Slider',
        ];
       return view('backend.slider.addSlider',$data);
    }//End addSlider function

    //submitSlider
    public function submitSlider(Request $request)
    {        
        $validatedData = $request->validate([ 
            'firstTitle' => 'required',
            'secondTitle' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png',
        ], [ 
            'firstTitle.required' => 'Title field is required.',
            'secondTitle.required' => 'Title field is required.',
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);
        if (!$validatedData) 
        {
            return redirect()->back();
        }   
        // Retrieve input data
        $firstTitle = $request->input('firstTitle');
        $secondTitle = $request->input('secondTitle');
        // $image = $request->file('image');
        // // Validate and store the image
        // $imagePath = $image->store('uploadsSlider', 'public');

        $image = $request->file('image');

        // Customize the image name (e.g., slider_1, slider_2, etc.)
        $imageName = 'slider_' . (Slider::count() + 1) . '.' . $image->getClientOriginalExtension();

        // Validate and store the image
        $imagePath = $image->storeAs('uploadsSlider', $imageName, 'public');

        // Store data in the database
        Slider::create([
            'firstTitle' => $firstTitle,
            'secondTitle' => $secondTitle,
            'image_path' => $imagePath,
        ]);
        // Redirect or do something else after successful submission
        //return redirect()->back()->with('success', 'Slider submitted successfully.');
        return redirect()->route('manageSlider')->with('success', 'Slider submitted successfully.');     
    }//End submitSlider function

    //
    public function editSlider($id)
    {        
        // echo $id;
        // die();   
        try 
        {
            $slider = Slider::findOrFail($id);

            $data = [
                'pageTitle' => 'Edit Slider',
                'sliders' => $slider,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.slider.editSlider', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the menu with the specified ID is not found
            return redirect()->route('manageSlider')->with('error', 'Slider not found');
        }
    }//End editMenu function
    //updateSlider
    public function updateSlider(Request $request)
    {        
        $validatedData = $request->validate([ 
            'sliderId' => 'required|exists:sliders,id', // Assuming the hidden field is named menu_id
            'firstTitle' => 'required',
            'secondTitle' => 'required',
            'image' => 'nullable|file|mimes:jpeg,jpg,png',
        ],[ 
            'sliderId.required' => 'Slide ID field is required.',
            'sliderId.exists' => 'Invalid Slide ID.',
            'firstTitle.required' => 'Title field is required.',
            'secondTitle.required' => 'Title field is required.',
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);  
        // Find the Slider record based on sliderId
        $slider = Slider::findOrFail($request->input('sliderId'));

        // Update the fields
        $slider->update([
        'firstTitle' => $request->input('firstTitle'),
        'secondTitle' => $request->input('secondTitle'),
        ]);

        // Optionally update the image if provided
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            // Customize the image name (e.g., slider_1, slider_2, etc.)
            $imageName = 'slider_' . (Slider::count() + 1) . '.' . $image->getClientOriginalExtension();    
            // Validate and store the image
            $newImagePath = $image->storeAs('uploadsSlider', $imageName, 'public');
            // Update the image_path field
            $slider->update(['image_path' => $newImagePath]);
        }      
        return redirect()->route('manageSlider')->with('success', 'Slider updated successfully!');        
    }//End updateSlider function
    public function sliderToggleEnableStatus($id, Request $request)
    { 
        // echo "id ".$id;       
        // die();
        $slider = Slider::findOrFail($id);
        $previousStatus = $slider->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $slider->update(['is_enabled' => $newStatus]);
        // Check if the update was successful
        if ($slider->wasChanged('is_enabled')) 
        {
        return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageSlider')]);
        } 
        else 
        {
        return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End sliderToggleEnableStatus() 

    
    public function deleteSlider($id)
    {
        // echo $id;
        // die();
        try {
            // Find the slider by ID
            $menu = Slider::findOrFail($id);    
            // Update the isdeleted field
            $menu->update(['is_deleted' => 'y']);    
            // Redirect with success message
            return redirect()->back()->with('success', 'Slider deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the slider with the specified ID is not found
            return redirect()->back()->with('error', 'Slider not found');
        }
    }//End  deleteSlider function



    /**********
     * START--API FUNCTION
     * *********** */
    public function showSlider()
    {
    // Get all menus with their submenus
    $slider = Slider::where('is_enabled', true)->get();
    return $slider;
    //return view('navigation', ['menus' => $menus]);
    }
    /**********
     * END--API FUNCTION
     * *********** */

}
