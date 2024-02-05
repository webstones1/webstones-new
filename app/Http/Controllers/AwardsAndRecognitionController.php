<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crawler; // Import the Crawler model
use App\Models\ExcellenceAndExpertise; // Import the ExcellenceAndExpertise model
use App\Models\AwardsAndRecognition; // Import the AwardsAndRecognition model


use Illuminate\Support\Facades\Validator;
class AwardsAndRecognitionController extends Controller
{
    public function manageAwardsAndRecognition()
    {
        $data = [
            'pageTitle' => 'Manage Awards & Recognitons',
            'awardsAndRecognitions' => AwardsAndRecognition::where('is_deleted', 'n')->paginate(5), // You can adjust the number of items per page as needed
        ];
       return view('backend.AwardsAndRecognition.manageAwardsAndRecognition',$data);        
    }//End manageAwardsAndRecognition function
    public function addAwardsAndRecognition()
    {        
        $data = [
            'pageTitle' => 'Add Awards And Recognition',
        ];
       return view('backend.AwardsAndRecognition.addAwardsAndRecognition',$data);
    }//End addAwardsAndRecognition function

    //submitAwardsAndRecognition
    public function submitAwardsAndRecognition(Request $request)
    {    
        // echo "submitAwardsAndRecognition";
        // die;    
        $validatedData = $request->validate([ 
            'title' => 'required',
            'description' => 'required',            
            'image' => 'required|file|mimes:jpeg,jpg,png',
        ], [ 
            'title.required' => 'Title field is required.',
            'description.required' => 'Description field is required.',           
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);         
        // Retrieve input data
        $title = $request->input('title');
        $description = $request->input('description');       
        $image = $request->file('image');
        // echo "title :".$title."content :".$content."url :".$url."image :".$image;
        // die;
        // $image = $request->file('image');
        // // Validate and store the image
        // $imagePath = $image->store('uploadsSlider', 'public');
        // Customize the image name (e.g., tab_1, tab_2, etc.)
        $imageName = 'Tab_' . (AwardsAndRecognition::count() + 1) . '.' . $image->getClientOriginalExtension();
        // Validate and store the image
        $imagePath = $image->storeAs('uploadsAwardsAndRecognition', $imageName, 'public');

        // Store data in the database
        AwardsAndRecognition::create([
            'title' => $title,
            'description' => $description,                      
            'image' => $imagePath,
        ]);
        // Redirect or do something else after successful submission
        //return redirect()->back()->with('success', 'Slider submitted successfully.');
        return redirect()->route('manageAwardsAndRecognition')->with('success', 'AwardsAndRecognition submitted successfully.');     
    }//End submitAwardsAndRecognition function

    //
    public function editAwardsAndRecognition($id)
    {        
        // echo $id;
        // die();   
        try 
        {
            $awardsAndRecognition = AwardsAndRecognition::findOrFail($id);
            $data = [
                'pageTitle' => 'Edit Crawler',
                'awardsAndRecognition' => $awardsAndRecognition,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.AwardsAndRecognition.editAwardsAndRecognition', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the crowler with the specified ID is not found
            return redirect()->route('manageAwardsAndRecognition')->with('error', 'AwardsAndRecognition not found');
        }
    }//End editAwardsAndRecognition function

    //updateAwardsAndRecognition
    public function updateAwardsAndRecognition(Request $request)
    {  
        // echo "ggg";
        // die(); 
        $validatedData = $request->validate([
            'awardsAndRecognitionId' => 'required|exists:awardsandrecognition,id', // Assuming the hidden field is named awardsAndRecognitionId 
            'title' => 'required',
            'description' => 'required',                    
            'image' => 'nullable|file|mimes:jpeg,jpg,png',
        ], [ 
            'awardsAndRecognitionId.required' => 'AwardsAndRecognition ID field is required.',
            'awardsAndRecognitionId.exists' => 'Invalid AwardsAndRecognition ID.',
            'title.required' => 'Title field is required.',
            'description.required' => 'Description field is required.',                     
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);
        // Find the Excellenceandexpertise record based on ExcellenceandexpertiseId
        $awardsAndRecognitions = AwardsAndRecognition::findOrFail($request->input('awardsAndRecognitionId'));
        // Update the fields
        $awardsAndRecognitions->update([        
        'title' => $request->input('title'),
        'description' => $request->input('description'),        
        ]);

        // Optionally update the image if provided
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            // Customize the image name (e.g., tab_, tab_2, etc.)
            $imageName = 'Tab_' . (AwardsAndRecognition::count() + 1) . '.' . $image->getClientOriginalExtension();    
            // Validate and store the image
            $newImagePath = $image->storeAs('uploadsAwardsAndRecognition', $imageName, 'public');
            // Update the image field
            $awardsAndRecognitions->update(['image' => $newImagePath]);
        }      
        return redirect()->route('manageAwardsAndRecognition')->with('success', 'AwardsAndRecognition updated successfully!');        
    }//End updateAwardsAndRecognition function

    public function awardsAndRecognitionsToggleEnableStatus($id, Request $request)
    { 
        // echo "id ".$id;       
        // die();
        $awardsAndRecognitions = AwardsAndRecognition::findOrFail($id);
        $previousStatus = $awardsAndRecognitions->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $awardsAndRecognitions->update(['is_enabled' => $newStatus]);
        // Check if the update was successful
        if ($awardsAndRecognitions->wasChanged('is_enabled')) 
        {
        return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageAwardsAndRecognition')]);
        } 
        else 
        {
        return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End awardsAndRecognitionsToggleEnableStatus() 
    
    public function deleteAwardsAndRecognition($id)
    {
        // echo $id;
        // die();
        try {
            // Find the AwardsAndRecognition by ID
            $awardsAndRecognitions = AwardsAndRecognition::findOrFail($id);    
            // Update the isdeleted field
            $awardsAndRecognitions->update(['is_deleted' => 'y']);    
            // Redirect with success message
            return redirect()->back()->with('success', 'AwardsAndRecognition deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the AwardsAndRecognition with the specified ID is not found
            return redirect()->back()->with('error', 'AwardsAndRecognition not found');
        }
    }//End  deleteAwardsAndRecognition function

    /**********
     * START--API FUNCTION
     * *********** */
    // public function showExcellenceAndExpertise()
    // {
    //     // Get all ExcellenceAndExpertise with their submenus
    //     $ExcellenceAndExpertise = ExcellenceAndExpertise::where('is_enabled', true)->get();
    //     return $ExcellenceAndExpertise;
    //     //return view('navigation', ['menus' => $menus]);
    // }
    /**********
     * END--API FUNCTION
     * ************/

}
