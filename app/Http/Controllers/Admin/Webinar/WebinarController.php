<?php

namespace App\Http\Controllers\Admin\Webinar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Webinar;
use App\Models\Category;
use File;
use Str;
use Yajra\DataTables\Facades\DataTables;
class WebinarController extends Controller
{
    public function webinars(Request $request)
    {
        if ($request->ajax()) {
            $webinars = Webinar::orderBy('created_at', 'desc');
    
            return Datatables::eloquent($webinars)
                ->addIndexColumn()
                ->addColumn('action', function ($webinar) {
                    $editUrl = route('webinar.edit', $webinar->id);
                    $deleteUrl = route('webinar.delete', $webinar->id);
                    return '
                        <div class="d-flex align-items-center gap-1">
                            <a href="' . $editUrl . '" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <a href="' . $deleteUrl . '" class="btn btn-outline-danger delete-confirm ""><i class="bi bi-trash3-fill"></i></a>
                            
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.webinar.webinar_list');
    }

    public function webinarCreate()
    {
        $categories = Category::all();
        return view('admin.webinar.webinar_create', compact('categories'));

    }

    public function webinarStore(Request $request)
{
    // Validate the request
    $request->validate([
        'webinar_title' => 'required|string',
        'category_id' => 'required',
        'speaker_name' => 'required|string',
        'webinar_start_date' => 'required|date',
        'webinar_start_time' => 'required|date_format:H:i',
        'webinar_end_date' => 'required|date',
        'webinar_end_time' => 'required|date_format:H:i',
        'about_speaker' => 'nullable|string',
        'webinar_type' => 'nullable|string',
        'webinar_mode' => 'nullable|string',
        'webinar_price' => 'nullable|numeric',
        'webinar_link' => 'nullable|url',
        'webinar_address' => 'nullable|string',
        'webinar_description' => 'nullable|string',
        'status' => 'nullable|string',
        'speaker_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    // Create the webinar
    $webinar = Webinar::create([
        'webinar_title' => $request->webinar_title,
        'category_id' => $request->category_id,
        'webinar_start_date' => $request->webinar_start_date,
        'webinar_start_time' => $request->webinar_start_time,
        'webinar_end_date' => $request->webinar_end_date,
        'webinar_end_time' => $request->webinar_end_time,
        'speaker_name' => $request->speaker_name,
        'about_speaker' => $request->about_speaker,
        'webinar_type' => $request->webinar_type,
        'webinar_mode' => $request->webinar_mode,
        'webinar_price' => $request->webinar_price,
        'webinar_link' => $request->webinar_link,
        'webinar_address' => $request->webinar_address,
        'webinar_description' => $request->webinar_description,
        'status' => $request->status,
    ]);

    if ($request->hasFile('speaker_image')) {
        if (!empty($webinar->speaker_image) && file_exists('upload/webinar/' . $webinar->speaker_image)) {
            unlink('upload/webinar/' . $webinar->speaker_image);
        }

        $file = $request->file('speaker_image');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move('upload/webinar/', $filename);
        $webinar->speaker_image = $filename;
        $webinar->save(); 
    }

    return redirect()->route('webinar.list')->with('success', 'Webinar created successfully!');
}

public function editWebinar($id){
    $categories = Category::all();
    $webinar = Webinar::findOrFail($id);
    return view('admin.webinar.webinar_edit', compact('categories','webinar'));
}
public function updateWebinar(Request $request, $id)
{
    $request->validate([
        'webinar_title' => 'required|string',
        'category_id' => 'required',
        'speaker_name' => 'required|string',
        'webinar_start_date' => 'required|date',
        'webinar_start_time' => 'required',
        'webinar_end_date' => 'required|date',
        'webinar_end_time' => 'required',
        'about_speaker' => 'nullable|string',
        'webinar_type' => 'nullable|string',
        'webinar_mode' => 'nullable|string',
        'webinar_price' => 'nullable|numeric',
        'webinar_link' => 'nullable|url',
        'webinar_address' => 'nullable|string',
        'webinar_description' => 'nullable|string',
        'status' => 'nullable|string',
        'speaker_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);


    $webinar = Webinar::findOrFail($id);

    $webinar->update([
        'webinar_title' => $request->webinar_title,
        'category_id' => $request->category_id,
        'webinar_start_date' => $request->webinar_start_date,
        'webinar_start_time' => $request->webinar_start_time,
        'webinar_end_date' => $request->webinar_end_date,
        'webinar_end_time' => $request->webinar_end_time,
        'speaker_name' => $request->speaker_name,
        'about_speaker' => $request->about_speaker,
        'webinar_type' => $request->webinar_type,
        'webinar_mode' => $request->webinar_mode,
        'webinar_price' => $request->webinar_price,
        'webinar_link' => $request->webinar_link,
        'webinar_address' => $request->webinar_address,
        'webinar_description' => $request->webinar_description,
        'status' => $request->status,
    ]);

    // Handle image upload
    if ($request->hasFile('speaker_image')) {
        $uploadPath = public_path('upload/webinar');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true);
        }

        // Delete old image if exists
        if (!empty($webinar->speaker_image) && file_exists($uploadPath . '/' . $webinar->speaker_image)) {
            unlink($uploadPath . '/' . $webinar->speaker_image);
        }

        $file = $request->file('speaker_image');
        $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);

        $webinar->speaker_image = $filename;
        $webinar->save();
    }

    return redirect()->route('webinar.list')->with('success', 'Webinar updated successfully!');
}

public function deleteWebinar($id){
    $webinar = Webinar::findOrFail($id);
    if (!empty($webinar->speaker_image) && file_exists('upload/webinar/' . $webinar->speaker_image)) {
        unlink('upload/webinar/' . $webinar->speaker_image);
    }

    $webinar->delete();

    return redirect()->route('webinar.list')->with('success', 'Webinar deleted successfully!');
}

}
