<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Webinar;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
{
    // Fetch categories with their related webinars
    $categories = Category::with('webinars')->get();

    // Pass only the categories with their webinars to the view
    return view('frontend.home.index', compact('categories'));
}


public function webinarDetails($id)
{
    // Find the current webinar
    $webinar = Webinar::findOrFail($id);
    
    // Fetch related webinars based on the same category
    $relatedWebinars = Webinar::where('category_id', $webinar->category_id)
                                ->where('id', '!=', $id) // Exclude the current webinar
                                ->get();

    return view('frontend.home.webinar_details', compact('webinar', 'relatedWebinars'));
}

public function register(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'webinar_title' => 'required|string|max:255',
    ]);

    // Handle the registration logic (e.g., save to the database, send an email, etc.)

    // Redirect back with a success message
    return redirect()->back()->with('success', 'You have successfully registered for the webinar!');
}


}
