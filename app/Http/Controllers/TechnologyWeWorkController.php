<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crawler; // Import the Crawler model
use App\Models\ExcellenceAndExpertise; // Import the ExcellenceAndExpertise model
use App\Models\AwardsAndRecognition; // Import the AwardsAndRecognition model
use App\Models\TechnologyWeWork; // Import the AwardsAndRecognition model

use Illuminate\Support\Facades\Validator;
class TechnologyWeWorkController extends Controller
{
    public function manageTecnologyWeWork()
    {
        $data = [
            'pageTitle' => 'Manage Technology We Work',
            'technologyWeWorks' => TechnologyWeWork::where('is_deleted', 'n')->paginate(5), 
            // You can adjust the number of items per page as needed
        ];
       return view('backend.TechnologhWeWork.manageTechnologyWeWork',$data);        
    }//End manageTecnologyWeWork function

    public function addTechnologyWeWork()
    {        
        $data = [
            'pageTitle' => 'Add Technology We Work',
        ];
       return view('backend.TechnologhWeWork.addTechnologyWeWork',$data);
    }//End addTechnologyWeWork function

    //submitAwardsAndRecognition
    public function submitTechnologyWeWork(Request $request)
    {    
        // echo "submitTechnologyWeWork";
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
        $imageName = 'Tech_' . (TechnologyWeWork::count() + 1) . '.' . $image->getClientOriginalExtension();
        // Validate and store the image
        $imagePath = $image->storeAs('uploadsTechnologyWeWork', $imageName, 'public');
        // Store data in the database
        TechnologyWeWork::create([
            'title' => $title,
            'description' => $description,                      
            'image' => $imagePath,
        ]);
        // Redirect or do something else after successful submission
        //return redirect()->back()->with('success', 'Slider submitted successfully.');
        return redirect()->route('manageTecnologyWeWork')->with('success', 'manageTechnologyWeWork submitted successfully.');     
    }//End submitTechnologyWeWork function

    //
    public function editTechnologyWeWork($id)
    {        
        // echo $id;
        // die();   
        try 
        {
            $technologyWeWork = TechnologyWeWork::findOrFail($id);
            $data = [
                'pageTitle' => 'Edit Crawler',
                'technologyWeWork' => $technologyWeWork,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.TechnologhWeWork.editTechnologyWeWork', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the crowler with the specified ID is not found
            return redirect()->route('manageTecnologyWeWork')->with('error', 'TecnologyWeWork not found');
        }
    }//End editTechnologyWeWork function

    //updateAwardsAndRecognition
    public function updateTechnologyWeWork(Request $request)
    {  
        // echo "ggg";
        // die(); 
        $validatedData = $request->validate([
            'technologyWeWorkId' => 'required|exists:technologywework,id', // Assuming the hidden field is named awardsAndRecognitionId 
            'title' => 'required',
            'description' => 'required',                    
            'image' => 'nullable|file|mimes:jpeg,jpg,png',
        ], [ 
            'technologyWeWorkId.required' => 'Technologywework ID field is required.',
            'technologyWeWorkId.exists' => 'Invalid Technologywework ID.',
            'title.required' => 'Title field is required.',
            'description.required' => 'Description field is required.',                     
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);
        // Find the Excellenceandexpertise record based on ExcellenceandexpertiseId
        $technologyWeWorks = TechnologyWeWork::findOrFail($request->input('technologyWeWorkId'));
        // Update the fields
        $technologyWeWorks->update([        
        'title' => $request->input('title'),
        'description' => $request->input('description'),        
        ]);

        // Optionally update the image if provided
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            // Customize the image name (e.g., tech_, tech_, etc.)
            $imageName = 'Tech_' . (TechnologyWeWork::count() + 1) . '.' . $image->getClientOriginalExtension();    
            // Validate and store the image
            $newImagePath = $image->storeAs('uploadsTechnologyWeWork', $imageName, 'public');
            // Update the image field
            $technologyWeWorks->update(['image' => $newImagePath]);
        }      
        return redirect()->route('manageTecnologyWeWork')->with('success', 'manageTecnologyWeWork updated successfully!');        
    }//End updateTechnologyWeWork function

    public function technologyweworksToggleEnableStatus($id, Request $request)
    { 
        // echo "id ".$id;       
        // die();
        $technologyweworks = TechnologyWeWork::findOrFail($id);
        $previousStatus = $technologyweworks->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $technologyweworks->update(['is_enabled' => $newStatus]);
        // Check if the update was successful
        if ($technologyweworks->wasChanged('is_enabled')) 
        {
        return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageTecnologyWeWork')]);
        } 
        else 
        {
        return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End technologyweworksToggleEnableStatus() 
    
    public function deleteTechnologyWeWork($id)
    {
        // echo $id;
        // die();
        try {
            // Find the AwardsAndRecognition by ID
            $technologyWeWorks = TechnologyWeWork::findOrFail($id);    
            // Update the isdeleted field
            $technologyWeWorks->update(['is_deleted' => 'y']);    
            // Redirect with success message
            return redirect()->back()->with('success', 'TechnologyWeWork deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the AwardsAndRecognition with the specified ID is not found
            return redirect()->back()->with('error', 'TechnologyWeWork not found');
        }
    }//End  deleteTechnologyWeWork function

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
