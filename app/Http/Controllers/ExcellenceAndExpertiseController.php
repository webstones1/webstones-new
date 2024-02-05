<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crawler; // Import the Crawler model
use App\Models\ExcellenceAndExpertise; // Import the Crawler model

use Illuminate\Support\Facades\Validator;
class ExcellenceAndExpertiseController extends Controller
{
    public function manageExcellenceAndExpertise()
    {
        $data = [
            'pageTitle' => 'Manage Excellence & Expertise',
            'excellenceAndExpertises' => ExcellenceAndExpertise::where('is_deleted', 'n')->paginate(5), // You can adjust the number of items per page as needed
        ];
       return view('backend.ExcellenceAndExpertise.manageExcellenceAndExpertise',$data);        
    }//End manageExcellenceAndExpertise function
    public function addExcellenceAndExpertise()
    {        
        $data = [
            'pageTitle' => 'Add Excellence & Expertise',
        ];
       return view('backend.ExcellenceAndExpertise.addExcellenceAndExpertise',$data);
    }//End addExcellenceAndExpertise function

    //submitSlider
    public function submitExcellenceAndExpertise(Request $request)
    {        
        $validatedData = $request->validate([ 
            'title' => 'required',
            'description' => 'required',
            'tabTopTitle' => 'required',
            'tabRightTitle' => 'required',
            'tabBottomTitle' => 'required',
            'tabLeftTitle' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png',
        ], [ 
            'title.required' => 'Title field is required.',
            'description.required' => 'Description field is required.',
            'tabTopTitle.required' => 'Title field is required.',
            'tabRightTitle.required' => 'Title field is required.',
            'tabBottomTitle.required' => 'Title field is required.',
            'tabLeftTitle.required' => 'Title field is required.',
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);         
        // Retrieve input data
        $title = $request->input('title');
        $description = $request->input('description');
        $tabTopTitle= $request->input('tabTopTitle');
        $tabRightTitle= $request->input('tabRightTitle');
        $tabBottomTitle= $request->input('tabBottomTitle');
        $tabLeftTitle= $request->input('tabLeftTitle');
        $image = $request->file('image');
        // echo "title :".$title."content :".$content."url :".$url."image :".$image;
        // die;
        // $image = $request->file('image');
        // // Validate and store the image
        // $imagePath = $image->store('uploadsSlider', 'public');
        

        // Customize the image name (e.g., tab_1, tab_2, etc.)
        $imageName = 'Tab_' . (ExcellenceAndExpertise::count() + 1) . '.' . $image->getClientOriginalExtension();

        // Validate and store the image
        $imagePath = $image->storeAs('uploadsExcellenceAndExpertise', $imageName, 'public');

        // Store data in the database
        ExcellenceAndExpertise::create([
            'title' => $title,
            'description' => $description,
            'tabTopTitle' => $tabTopTitle,
            'tabRightTitle' => $tabRightTitle,
            'tabBottomTitle' => $tabBottomTitle,
            'tabLeftTitle' => $tabLeftTitle,            
            'image' => $imagePath,
        ]);
        // Redirect or do something else after successful submission
        //return redirect()->back()->with('success', 'Slider submitted successfully.');
        return redirect()->route('manageExcellenceAndExpertise')->with('success', 'ExcellenceAndExpertise submitted successfully.');     
    }//End submitExcellenceAndExpertise function

    //
    public function editExcellenceAndExpertise($id)
    {        
        // echo $id;
        // die();   
        try 
        {
            $excellenceAndExpertises = ExcellenceAndExpertise::findOrFail($id);
            $data = [
                'pageTitle' => 'Edit Crawler',
                'excellenceAndExpertises' => $excellenceAndExpertises,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.ExcellenceAndExpertise.editExcellenceAndExpertise', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the crowler with the specified ID is not found
            return redirect()->route('manageExcellenceAndExpertise')->with('error', 'ExcellenceAndExpertise not found');
        }
    }//End editExcellenceAndExpertise function

    //updateExcellenceAndExpertise
    public function updateExcellenceAndExpertise(Request $request)
    {  
        // echo "ggg";
        // die(); 
        $validatedData = $request->validate([
            'excellenceAndExpertisesId' => 'required|exists:excellenceandexpertise,id', // Assuming the hidden field is named excellenceandexpertiseId 
            'title' => 'required',
            'description' => 'required',
            'tabTopTitle' => 'required',
            'tabRightTitle' => 'required',
            'tabBottomTitle' => 'required',
            'tabLeftTitle' => 'required',            
            'image' => 'nullable|file|mimes:jpeg,jpg,png',
        ], [ 
            'excellenceAndExpertisesId.required' => 'Excellenceandexpertise ID field is required.',
            'excellenceAndExpertisesId.exists' => 'Invalid Excellenceandexpertise ID.',
            'title.required' => 'Title field is required.',
            'description.required' => 'Description field is required.',
            'tabTopTitle.required' => 'Title field is required.',
            'tabRightTitle.required' => 'Title field is required.',
            'tabBottomTitle.required' => 'Title field is required.',
            'tabLeftTitle.required' => 'Title field is required.',            
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);
        // Find the Excellenceandexpertise record based on ExcellenceandexpertiseId
        $excellenceAndExpertises = ExcellenceAndExpertise::findOrFail($request->input('excellenceAndExpertisesId'));
        // Update the fields
        $excellenceAndExpertises->update([        
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'tabTopTitle' => $request->input('tabTopTitle'),
        'tabRightTitle' => $request->input('tabRightTitle'),
        'tabBottomTitle' => $request->input('tabBottomTitle'),
        'tabLeftTitle' => $request->input('tabLeftTitle'),
        ]);

        // Optionally update the image if provided
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            // Customize the image name (e.g., tab_, tab_2, etc.)
            $imageName = 'Tab_' . (ExcellenceAndExpertise::count() + 1) . '.' . $image->getClientOriginalExtension();    
            // Validate and store the image
            $newImagePath = $image->storeAs('uploadsExcellenceAndExpertise', $imageName, 'public');
            // Update the image field
            $excellenceAndExpertises->update(['image' => $newImagePath]);
        }      
        return redirect()->route('manageExcellenceAndExpertise')->with('success', 'ExcellenceAndExpertise updated successfully!');        
    }//End updateExcellenceAndExpertise function

    public function excellenceAndExpertiseToggleEnableStatus($id, Request $request)
    { 
        // echo "id ".$id;       
        // die();
        $excellenceAndExpertises = ExcellenceAndExpertise::findOrFail($id);
        $previousStatus = $excellenceAndExpertises->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $excellenceAndExpertises->update(['is_enabled' => $newStatus]);
        // Check if the update was successful
        if ($excellenceAndExpertises->wasChanged('is_enabled')) 
        {
        return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageExcellenceAndExpertise')]);
        } 
        else 
        {
        return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End excellenceAndExpertiseToggleEnableStatus() 
    
    public function deleteExcellenceAndExpertise($id)
    {
        // echo $id;
        // die();
        try {
            // Find the ExcellenceAndExpertise by ID
            $excellenceAndExpertises = ExcellenceAndExpertise::findOrFail($id);    
            // Update the isdeleted field
            $excellenceAndExpertises->update(['is_deleted' => 'y']);    
            // Redirect with success message
            return redirect()->back()->with('success', 'ExcellenceAndExpertise deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the ExcellenceAndExpertise with the specified ID is not found
            return redirect()->back()->with('error', 'ExcellenceAndExpertise not found');
        }
    }//End  deleteExcellenceAndExpertise function

    /**********
     * START--API FUNCTION
     * *********** */
    public function showExcellenceAndExpertise()
    {
        // Get all ExcellenceAndExpertise with their submenus
        $ExcellenceAndExpertise = ExcellenceAndExpertise::where('is_enabled', true)->get();
        return $ExcellenceAndExpertise;
        //return view('navigation', ['menus' => $menus]);
    }
    /**********
     * END--API FUNCTION
     * ************/

}
