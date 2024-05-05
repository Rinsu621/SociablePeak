<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function postStore(Request $request){
        // dd($request->all());
        try {
            // Retrieve the authenticated user's ID
            $userId = auth()->id();
    
            // Validate request data
            $request->validate([
                'description' => 'required|string',
            ]);
    
            // Retrieve data from the POST request
            $data = [
                'user_id' => $userId,
                'description' => $request->input('description'),
            ];
    
            // Create or update user engagement data
            Post::create($data);
            return redirect()->back()->with('message', 'Successfully Posted');
        } catch (ValidationException $e) {
            // If a validation error occurs, catch the ValidationException
            // and redirect back with the validation error messages            
            return redirect()->back()->withErrors($e->getMessage())->withInput();

        } catch (Exception $e) {
            // If any other type of exception occurs, catch it and
            // redirect back with the exception message
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
