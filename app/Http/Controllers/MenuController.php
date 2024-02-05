<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Import the Menu model
use App\Models\SubMenu; // Import the subMenu model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class MenuController extends Controller
{
    // public function getMenus()
    // {
    //     // $menus=Menu::all();      
    //     // return response()->json($menus); 
    //     // return $data;
    //     $menus = Menu::with('submenus')->get(); // Eager load submenus

    //     // You can structure your data as needed. This example assumes a simple structure.
    //     $data = $menus->map(function ($menu) {
    //         return [
    //             'id' => $menu->id,
    //             'name' => $menu->name,
    //             'submenus' => $menu->submenus->map(function ($submenu) {
    //                 return [
    //                     'id' => $submenu->id,
    //                     'name' => $submenu->name,
    //                     // Add any other fields you need from the submenu
    //                 ];
    //             }),
    //         ];
    //     });

    //     return response()->json($data);
    // }
    
     

    public function addMenu()
    {        
        $data = [
            'pageTitle' => 'Add Menu',
        ];
       return view('backend.menu.addMenu',$data);
    }//End addMenu function
    public function submitMenu(Request $request)
    {        
        $validatedData = $request->validate([ 
            'title' => 'required',
            'link' => 'required'
        ], [ 
            'title.required' => 'Title field is required.',
            'link.required' => 'Link field is required.',
        ]);
        if (!$validatedData) 
        {
            return redirect()->back();
        }
        // Create a new Menu instance
        $menu = new Menu;
        // Assign values from the request to the menu instance
        $menu->title = $request->input('title');
        $menu->link = $request->input('link');
        // Save the menu to the database
        $menu->save();
        // Check if the save operation was successful
        if ($menu->id) 
        {
            // If successful, redirect to the menu listing view with success message
            return redirect()->route('manageMenu')->with('success', 'Menu added successfully!');
        } 
        else 
        {
            // If unsuccessful, redirect back to the menu page with an error message
            return redirect()->route('addMenu')->with('error', 'Failed to add menu. Please try again.');
        }
    }//End submitMenu function
    
    public function manageMenu()
    {
        // $data = [
        //     'pageTitle' => 'Manage Menu',
        //     ];
        $data = [
            'pageTitle' => 'Manage Menu',
            'menus' => Menu::where('is_deleted', 'n')->paginate(10), // You can adjust the number of items per page as needed
        ];
       return view('backend.menu.manageMenu',$data);
        
    }//End manageMenu function   
    public function menuToggleEnableStatus($id, Request $request)
    {
        // $menu = Menu::findOrFail($id);
        // $newStatus = $menu->is_enabled === 'y' ? 'n' : 'y';
        // $menu->update(['is_enabled' => $newStatus]);
        // return response()->json(['status' => 'success', 'message' => 'Toggle successful']);
        $menu = Menu::findOrFail($id);
        $previousStatus = $menu->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $menu->update(['is_enabled' => $newStatus]);

        // Check if the update was successful
        if ($menu->wasChanged('is_enabled')) {
        return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageMenu')]);
        } else {
        return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End menuToggleEnableStatus()

    
    public function editMenu($id)
    {        
        //     echo $id;
        //     die();   
        try 
        {
            $menu = Menu::findOrFail($id);

            $data = [
                'pageTitle' => 'Edit Menu',
                'menu' => $menu,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.menu.editMenu', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the menu with the specified ID is not found
            return redirect()->route('manageMenu')->with('error', 'Menu not found');
        }
    }//End editMenu function

    public function updateMenu(Request $request)
    {        
        $validatedData = $request->validate([ 
            'menuId' => 'required|exists:menus,id', // Assuming the hidden field is named menu_id
            'title' => 'required',
            'link' => 'required'
        ], [ 
            'menuId.required' => 'Menu ID field is required.',
            'menuId.exists' => 'Invalid Menu ID.',
            'title.required' => 'Title field is required.',
            'link.required' => 'Link field is required.',
        ]);  
        // Retrieve the menu based on the hidden field value
        $menu = Menu::findOrFail($request->input('menuId'));    
        // Update the menu with the new data
        $menu->update([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            // Add other fields as needed
        ]);    
        // Redirect with success message
        //return redirect()->back()->with('success', 'Menu updated successfully');
        return redirect()->route('manageMenu')->with('success', 'Menu updated successfully!');
        
    }//End updateMenu function
    public function deleteMenu($id)
    {
        // echo $id;
        // die();
        try {
            // Find the menu by ID
            $menu = Menu::findOrFail($id);
    
            // Update the isdeleted field
            $menu->update(['is_deleted' => 'y']);
    
            // Redirect with success message
            return redirect()->back()->with('success', 'Menu deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the menu with the specified ID is not found
            return redirect()->back()->with('error', 'Menu not found');
        }
    }//End  deleteMenu function

    /******************START-SUBMENU ***************************** */
    public function manageSubMenu()
    {
        // $data = [
        //     'pageTitle' => 'Manage Menu',
        //];
        $data = [
            'pageTitle' => 'Manage SubMenu',
            'submenus' => SubMenu::where('is_deleted', 'n')->with('menu')->paginate(10),
        ];
        return view('backend.submenu.manageSubMenu',$data);        
    }//End manageSubMenu function   
    public function addSubMenu()
    {        
        $menus = Menu::all();

        $data = [
            'pageTitle' => 'Add SubMenu',
            'menus' => $menus,
                ];
        return view('backend.submenu.addSubMenu',$data);
    }//End addSubMenu function
    public function submitSubMenu(Request $request)
    {        
        $validatedData = $request->validate([
            'parentMenu' => 'required', 
            'title' => 'required',
            'link' => 'required'
        ], [ 
            'parentMenu.required' => 'Menu field is required.',
            'title.required' => 'Title field is required.',
            'link.required' => 'Link field is required.',
        ]);
        if (!$validatedData) 
        {
            return redirect()->back();
        }
        // Create a new subMenu instance
        $subMenu = new SubMenu;
        // Assign values from the request to the subMenu instance
        $subMenu->menu_id = $request->input('parentMenu');
        $subMenu->title = $request->input('title');
        $subMenu->link = $request->input('link');
        // Save the subMenu to the database
        $subMenu->save();
        // Check if the save operation was successful
        if ($subMenu->id) 
        {
            // If successful, redirect to the subMenu listing view with success message
            return redirect()->route('manageSubMenu')->with('success', 'subMenu added successfully!');
        } 
        else 
        {
            // If unsuccessful, redirect back to the subMenu page with an error message
            return redirect()->route('manageSubMenu')->with('error', 'Failed to add menu. Please try again.');
        }
    }//End submitMenu function

    
    public function editSubMenu($id)
    {        
            // echo $id;
            // die();   
        try 
        {
            $subMenu = SubMenu::findOrFail($id);
            $menus = Menu::all();
            // echo "<pre>";
            // print_r($subMenu);            
            // die;

            $data = [
                'pageTitle' => 'Edit SubMenu',
                'submenu' => $subMenu,
                'menus' => $menus,
            ];
            // echo "<pre>";
            // print_r($data);
            // die();
            return view('backend.submenu.editSubMenu', $data);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Handle the case where the menu with the specified ID is not found
            return redirect()->route('manageSubMenu')->with('error', 'SubMenu not found');
        }
    }//End editSubMenu function

    public function updateSubMenu(Request $request)
    {        
        $validatedData = $request->validate([ 
            'subMenuId' => 'required|exists:submenus,id', // Assuming the hidden field is named subMenuId
            'title' => 'required',
            'link' => 'required'
        ], [ 
            'subMenuId.required' => 'Menu ID field is required.',
            'subMenuId.exists' => 'Invalid SubMenu ID.',
            'title.required' => 'Title field is required.',
            'link.required' => 'Link field is required.',
        ]);  
        // Retrieve the SubMenu based on the hidden field value
        $submenu = SubMenu::findOrFail($request->input('subMenuId'));    
        // Update the SubMenu with the new data
        $submenu->update([           
            'menu_id' => $request->input('parentMenu'),
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            // Add other fields as needed
        ]);    
        // Redirect with success message
        //return redirect()->back()->with('success', 'Menu updated successfully');
        return redirect()->route('manageSubMenu')->with('success', 'SubMenu updated successfully!');        
    }//End updateSubMenu function   
    public function submenuToggleEnableStatus($id, Request $request)
    {
        // $menu = Menu::findOrFail($id);
        // $newStatus = $menu->is_enabled === 'y' ? 'n' : 'y';
        // $menu->update(['is_enabled' => $newStatus]);
        // return response()->json(['status' => 'success', 'message' => 'Toggle successful']);
        $submenu = SubMenu::findOrFail($id);
        $previousStatus = $submenu->is_enabled; // Save the previous status for comparison
        $newStatus = $previousStatus === 'y' ? 'n' : 'y';
        $submenu->update(['is_enabled' => $newStatus]);

        // Check if the update was successful
        if ($submenu->wasChanged('is_enabled')) {
        return response()->json(['status' => 'success','newStatus' => $newStatus , 'message' => 'Toggle successful','redirect' => route('manageSubMenu')]);
        } else {
        return response()->json(['status' => 'error', 'message' => 'No changes were made']);
        }
    }//End submenuToggleEnableStatus() 

    
    public function deleteSubMenu($id)
    {
        // echo $id;
        // die();
        try {
            // Find the submenu by ID
            $menu = SubMenu::findOrFail($id);    
            // Update the isdeleted field
            $menu->update(['is_deleted' => 'y']);    
            // Redirect with success message
            return redirect()->back()->with('success', 'SubMenu deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the submenu with the specified ID is not found
            return redirect()->back()->with('error', 'SubMenu not found');
        }
    }//End  deleteSubMenu function
    /******************END-SUBMENU*******************************/    

    /**********
     * START--API FUNCTION
     * *********** */
    public function showNavigation()
    {
    // Get all menus with their submenus
    $menus = Menu::with('submenus')->where('is_enabled', true)->get();
    return $menus;
    //return view('navigation', ['menus' => $menus]);
    }
    /**********
     * END--API FUNCTION
     * *********** */

}//END MenuController class
