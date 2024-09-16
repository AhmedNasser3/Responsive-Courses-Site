<?php

namespace App\Http\Controllers\Admin\SubCourses;

use Carbon\Carbon;
use App\Models\SubCourses;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\SubSubCategory\SubSubCategoryController;

class SubCoursesController extends Controller
{
    public function Home($sub_subcategory){
        $subcourses = SubCourses::where('sub_sub_categories_id', operator: $sub_subcategory)->get();

        return view('FrontEnd.Courses_section.courses',compact('subcourses'));
    }
    public function index(){

        $sub_subcategory = SubSubCategory::orderBy('title','ASC')->get();
    	$subcourses = SubCourses::latest()->get();
        return view('Admin.subcourses.index', compact('sub_subcategory','subcourses'));
    }
    public function create(){
        $sub_subcategories = SubSubCategory::latest()->get();
        return view('Admin.subcourses.create',compact('sub_subcategories'));
    }
    public function store(Request $request){
        // Validate input fields
        $request->validate([
            'sub_sub_categories_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'video' => 'nullable|mimes:mp4,mov,ogg|max:50000', // Validate video file if provided
        ]);

        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $filename = hexdec(uniqid()) . '.' . $videoFile->getClientOriginalExtension();
            $videoFile->storeAs('public/videos', $filename);

            // Save video path and other details
            $subCourse = SubCourses::create([
                'video' => $filename,
                'sub_sub_categories_id' => $request->sub_sub_categories_id,
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back();
        } else if ($request->has('video_path')) {
            // If only saving the video path
            SubCourses::create([
                'video' => $request->video_path,
                'sub_sub_categories_id' => $request->sub_sub_categories_id,
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }

    public function edit(){}
    public function update(){}
    public function delete($id){
        $subCategory = SubCourses::find($id);
        $subCategory->delete();
        return redirect()->route('video.index');

    }
}
