<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crawler; // Import the Crawler model
use App\Models\ExcellenceAndExpertise; // Import the ExcellenceAndExpertise model
use App\Models\Settings; // Import the Settings model
use Illuminate\Support\Facades\Validator;
class SettingsController extends Controller
{
    public function manageSettings()
    {
        $data = [
            'pageTitle' => 'Manage Settings',
            'settings' => Settings::where('is_deleted', 'n')->paginate(5), 
            // You can adjust the number of items per page as needed
            ];
       return view('backend.Settings.manageSettings',$data);        
    }//End manageSettings function
    public function addSettings()
    {        
        $data = ['pageTitle' => 'Add Settings',];
       return view('backend.Settings.addSettings',$data);
    }//End addSettings function

    //submitSlider
    public function submitaddSettingForm(Request $request)
    {        
        $validatedData = $request->validate([ 
            'contactInfo' => 'required',
            'emailId' => 'required',            
            'image' => 'file|mimes:jpeg,jpg,png',
        ], [ 
            'contactInfo.required' => 'Contact field is required.',
            'emailId.required' => 'Email field is required.',            
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);         
    
        // Retrieve input data
        $logoTagLine = $request->input('logoTagLine');
        $logoLink = $request->input('logoLink');
        $copyRightText = $request->input('copyRightText');
        $description = $request->input('description');
        $contactInfo = $request->input('contactInfo');
        $emailId = $request->input('emailId'); 
        $facebookInfo = $request->input('facebookInfo');
        $twitterInfo = $request->input('twitterInfo');
        $linkedInInfo = $request->input('linkedInInfo');
        $instagramInfo = $request->input('instagramInfo');
        $youtubeInfo = $request->input('youtubeInfo');      
        $image = $request->file('image'); 
    
        // Check if an image is provided
        if ($image) {
            // Customize the image name (e.g., tab_1, tab_2, etc.)
            $imageName = 'Tab_' . (Settings::count() + 1) . '.' . $image->getClientOriginalExtension();
    
            // Validate and store the image
            $imagePath = $image->storeAs('uploadsSettings', $imageName, 'public');
        } else {
            // If no image is provided, set $imagePath to null or any default value
            $imagePath = null;
        }
    
        // Store data in the database
        Settings::create([
            'logoTagLine' => $logoTagLine,
            'logoLink' => $logoLink,
            'copyRightText' => $copyRightText,
            'description' => $description,
            'contactInfo' => $contactInfo,
            'emailId' => $emailId,
            'facebookInfo' => $facebookInfo,
            'twitterInfo' => $twitterInfo,
            'linkedInInfo' => $linkedInInfo,
            'instagramInfo' => $instagramInfo,
            'youtubeInfo' => $youtubeInfo, 
            'image' => $imagePath,
        ]);
    
        // Redirect or do something else after successful submission        
        return redirect()->route('manageSettings')->with('success', 'Settings submitted successfully.');     
    }//End submitaddSettingForm function

    //
    public function editSetting($id)
    {        
        // echo $id;
        // die();   
        try 
        {
            $settings = Settings::findOrFail($id);
            $data = [
                'pageTitle' => 'Edit Crawler',
                'settings' => $settings,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.Settings.editSettings', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the crowler with the specified ID is not found
            return redirect()->route('manageSettings')->with('error', 'Settings not found');
        }
    }//End editSetting function

    //updateSetting
    public function updateSetting(Request $request)
    {  
        // echo "ggg";
        // die(); 
        $validatedData = $request->validate([
            'settingsId' => 'required|exists:settings,id', // Assuming the hidden field is named excellenceandexpertiseId 
            'contactInfo' => 'required',
            'emailId' => 'required',                       
            'image' => 'nullable|file|mimes:jpeg,jpg,png',
        ], [ 
            'settingsId.required' => 'Settings ID field is required.',
            'settingsId.exists' => 'Invalid Settings ID.',
            'contactInfo.required' => 'Contact field is required.',
            'emailId.required' => 'Email field is required.',                        
            'image.mimes' => 'Please upload a valid image file with extension .jpg, .jpeg, or .png',
        ]);
        // Find the settings record based on settingsId
        $settings = Settings::findOrFail($request->input('settingsId'));
        // Update the fields
        $settings->update([
        'logoTagLine' => $request->input('logoTagLine'),
        'logoLink' => $request->input('logoLink'),
        'copyRightText' => $request->input('copyRightText'),
        'description' => $request->input('description'),
        'contactInfo' => $request->input('contactInfo'),
        'emailId' => $request->input('emailId'),
        'facebookInfo' => $request->input('facebookInfo'),
        'twitterInfo' => $request->input('twitterInfo'),
        'linkedInInfo' => $request->input('linkedInInfo'),
        'instagramInfo' => $request->input('instagramInfo'),
        'youtubeInfo' => $request->input('youtubeInfo'),         
        ]);

        // Optionally update the image if provided
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            // Customize the image name (e.g., tab_, tab_2, etc.)
            $imageName = 'Tab_' . (Settings::count() + 1) . '.' . $image->getClientOriginalExtension();    
            // Validate and store the image
            $newImagePath = $image->storeAs('uploadsSettings', $imageName, 'public');
            // Update the image field
            $settings->update(['image' => $newImagePath]);
        }      
        return redirect()->route('manageSettings')->with('success', 'Settings updated successfully!');        
    }//End updateSetting function

    public function settingsToggleEnableStatus($id, Request $request)
    { 
        // echo "id ".$id;       
        // die();
        $settings = Settings::findOrFail($id);
        $previousStatus = $settings->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $settings->update(['is_enabled' => $newStatus]);
        // Check if the update was successful
        if ($settings->wasChanged('is_enabled')) 
        {
            return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageSettings')]);
        } 
        else 
        {
            return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End settingsToggleEnableStatus() 
    
    public function deleteSettings($id)
    {
        // echo $id;
        // die();
        try {
            // Find the ExcellenceAndExpertise by ID
            $settings = Settings::findOrFail($id);    
            // Update the isdeleted field
            $settings->update(['is_deleted' => 'y']);    
            // Redirect with success message
            return redirect()->back()->with('success', 'Settings deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the Settings with the specified ID is not found
            return redirect()->back()->with('error', 'Settings not found');
        }
    }//End  deleteSettings function

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
