<?php

namespace App\Http\Controllers\Admin\CoursesVisible;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CoursesVisible;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class CoursesVisibleController extends Controller
{
    public function index()
    {
        // Retrieve all courses visibility records and users
        $subCourses = CoursesVisible::orderBy('users_id', 'asc')
            ->orderBy('courses_id', 'asc')
            ->get();
        $users = User::all();
        return view('Admin.visibality.index', compact('subCourses', 'users'));
    }

    public function show_courses($userId)
    {
        // Retrieve all courses visibility records for a specific user
        $subCourses = CoursesVisible::where('users_id', $userId)->get();
        $visible = CoursesVisible::where('users_id', $userId)->orderBy('courses_id', 'asc')->get();
        $users = User::all();
        return view('Admin.visibality.show_courses', compact('subCourses', 'users', 'visible'));
    }

    public function updateVisibility(Request $request, $courseId)
    {
        // Validate the request
        $request->validate([
            'users_id' => 'required',
            'courses_id' => 'required',
            'sub_id' => 'required',
            'is_visible' => 'required|boolean',
        ]);

        // Find the course visibility record
        $saveCoursesVisible = CoursesVisible::where('courses_id', $courseId)
            ->where('users_id', $request->input('users_id'))
            ->first();

        if ($saveCoursesVisible) {
            // Update the visibility
            $saveCoursesVisible->update([
                'is_visible' => $request->input('is_visible'),
            ]);

            // Redirect with success message
            return redirect()->back()->with('success', 'Visibility updated successfully.');
        }

        // Redirect with error message if course not found
        return redirect()->back()->with('error', 'Course not found.');
    }

    public function AddAllCourses(Request $request, $userId)
    {
        // Validate user existence
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Get all course IDs
        $allCourses = CoursesVisible::select('courses_id')->distinct()->pluck('courses_id');

        // Get all subcategory IDs
        $allSubCategories = SubCategory::pluck('id');

        // Prepare data to insert
        $newCoursesForUser = [];

        foreach ($allCourses as $courseId) {
            foreach ($allSubCategories as $subCategoryId) {
                $newCoursesForUser[] = [
                    'users_id' => $userId,
                    'courses_id' => $courseId,
                    'sub_id' => $subCategoryId,
                    'is_visible' => 1, // Set the visibility as required
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into the database
        CoursesVisible::insert($newCoursesForUser);

        // Redirect with success message
        return redirect()->back()->with('success', 'All courses have been added for the user successfully.');
    }
}
