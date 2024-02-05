<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    // ...

    public function loginSubmit(Request $request)
    {
        $validatedData = $request->validate([ 
            'email' => 'required|email',           
            'password' => 'required|min:5'            
        ], [ 
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be an email address.',           
            'password.required' => 'Password field is required.',            
        ]);
        if (!$validatedData) 
        {
            return redirect()->back();
        }
        // Retrieve user by email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Check if the provided password matches the hashed password in the database
            if (Hash::check($request->password, $user->password)) {
                // Authentication successful
                // You can perform additional actions here if needed
                // For example, you might want to log in the user
                Auth::login($user);

                // Redirect to the home page or any other desired route
                // return redirect('/dashboard');
                $data = [
                    'pageTitle' => 'Dashboard',
                    //'menus' => Menu::paginate(3), // You can adjust the number of items per page as needed
                ];
               return view('backend.dashboard',$data);
            }
        }
        // Authentication failed
        // You can add an error message here if needed
        return redirect()->back()->withErrors(['loginfail' => 'Invalid email or password']);
    }
}
