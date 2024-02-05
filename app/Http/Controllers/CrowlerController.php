<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Import the Menu model
use App\Models\Slider; // Import the Slider model
use App\Models\Crawler; // Import the Crawler model
use Illuminate\Support\Facades\Validator;
class CrowlerController extends Controller
{
    public function manageCrowler()
    {
        $data = [
            'pageTitle' => 'Manage Crowler',
            'crawlers' => Crawler::where('is_deleted', 'n')->paginate(5), // You can adjust the number of items per page as needed
        ];
       return view('backend.crowler.manageCrowler',$data);        
    }//End manageCrowler function
    public function addCrowler()
    {        
        $data = [
            'pageTitle' => 'Add Crowler',
        ];
       return view('backend.crowler.addCrowler',$data);
    }//End addCrowler function

    //submitSlider
    public function submitCrowler(Request $request)
    {        
        $validatedData = $request->validate([ 
            'title' => 'required',
            'content' => 'required',
            'url' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png',
        ], [ 
            'title.required' => 'Title field is required.',
            'content.required' => 'Content field is required.',
            'url.required' => 'URL field is required.',
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);         
        // Retrieve input data
        $title = $request->input('title');
        $content = $request->input('content');
        $url= $request->input('url');
        $image = $request->file('image');
        // echo "title :".$title."content :".$content."url :".$url."image :".$image;
        // die;
        // $image = $request->file('image');
        // // Validate and store the image
        // $imagePath = $image->store('uploadsSlider', 'public');

        

        // Customize the image name (e.g., slider_1, slider_2, etc.)
        $imageName = 'Crowler_' . (Crawler::count() + 1) . '.' . $image->getClientOriginalExtension();

        // Validate and store the image
        $imagePath = $image->storeAs('uploadsCrowler', $imageName, 'public');

        // Store data in the database
        Crawler::create([
            'title' => $title,
            'content' => $content,
            'url' => $content,
            'image' => $imagePath,
        ]);
        // Redirect or do something else after successful submission
        //return redirect()->back()->with('success', 'Slider submitted successfully.');
        return redirect()->route('manageCrowler')->with('success', 'Crowler submitted successfully.');     
    }//End submitCrowler function

    //
    public function editCrowler($id)
    {        
        // echo $id;
        // die();   
        try 
        {
            $crowler = Crawler::findOrFail($id);

            $data = [
                'pageTitle' => 'Edit Crawler',
                'crowlers' => $crowler,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.crowler.editCrowler', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the crowler with the specified ID is not found
            return redirect()->route('manageCrowler')->with('error', 'Crowler not found');
        }
    }//End editCrowler function

    //updateSlider
    public function updateCrowler(Request $request)
    {  
        // echo "ggg";
        // die();
        

        $validatedData = $request->validate([
            'crowlerId' => 'required|exists:crawlers,id', // Assuming the hidden field is named crowlerId 
            'title' => 'required',
            'content' => 'required',
            'url' => 'required',
            'image' => 'nullable|file|mimes:jpeg,jpg,png',
        ], [ 
            'crowlerId.required' => 'Crowler ID field is required.',
            'crowlerId.exists' => 'Invalid Crowler ID.',
            'title.required' => 'Title field is required.',
            'content.required' => 'Content field is required.',
            'url.required' => 'URL field is required.',
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);
        // Find the Crawler record based on crowlerId
        $crowler = Crawler::findOrFail($request->input('crowlerId'));

        // Update the fields
        $crowler->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'url' => $request->input('url'), 
        ]);

        // Optionally update the image if provided
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            // Customize the image name (e.g., crowler_, crowler_2, etc.)
            $imageName = 'crowler_' . (Crawler::count() + 1) . '.' . $image->getClientOriginalExtension();    
            // Validate and store the image
            $newImagePath = $image->storeAs('uploadsCrowler', $imageName, 'public');
            // Update the image_path field
            $crowler->update(['image' => $newImagePath]);
        }      
        return redirect()->route('manageCrowler')->with('success', 'Crowler updated successfully!');        
    }//End updateCrowler function

    public function crowlerToggleEnableStatus($id, Request $request)
    { 
        // echo "id ".$id;       
        // die();
        $crowler = Crawler::findOrFail($id);
        $previousStatus = $crowler->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $crowler->update(['is_enabled' => $newStatus]);
        // Check if the update was successful
        if ($crowler->wasChanged('is_enabled')) 
        {
        return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageCrowler')]);
        } 
        else 
        {
        return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End crowlerToggleEnableStatus() 

    
    public function deleteCrowler($id)
    {
        // echo $id;
        // die();
        try {
            // Find the Crawler by ID
            $crowler = Crawler::findOrFail($id);    
            // Update the isdeleted field
            $crowler->update(['is_deleted' => 'y']);    
            // Redirect with success message
            return redirect()->back()->with('success', 'Crawler deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Crawler with the specified ID is not found
            return redirect()->back()->with('error', 'Crawler not found');
        }
    }//End  deleteCrowler function


   /**********
     * START--API FUNCTION
     * *********** */
    public function showCrowler()
    {
    // Get all menus with their submenus
    $crawler = Crawler::where('is_enabled', true)->get();
    return $crawler;
    //return view('navigation', ['menus' => $menus]);
    }
    /**********
     * END--API FUNCTION
     * *********** */

}
