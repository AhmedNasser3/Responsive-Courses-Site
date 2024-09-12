<?php

namespace App\Http\Controllers\Admin\CoursesVisible;

use App\Models\SubCourses;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CoursesVisible;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\SubCourseUserVisibility;

class CoursesVisibleController extends Controller
{
    public function index()
    {
        $subCourses = CoursesVisible::orderBy('users_id', direction: 'asc')
        ->orderBy('courses_id', 'asc')
        ->get();
        $users = User::all();
        return view('Admin.visibality.index', compact('subCourses', 'users'));
    }
    public function show_courses($users)
    {
        $subCourses = CoursesVisible::where('users_id', operator: $users)->get();
        $visible = CoursesVisible::where('users_id', operator: $users)->orderBy('courses_id', 'asc')
        ->get();
        $users = User::all();
        return view('Admin.visibality.show_courses', compact('subCourses', 'users','visible'));
    }
    public function updateVisibility(Request $request, $course_id)
    {
        // Validation
        $request->validate([
            'users_id' => 'required',
            'courses_id' => 'required',
            'sub_id' => 'required',
            'is_visible' => 'required|boolean', // إضافة قاعدة boolean للتحقق من أن القيمة إما 0 أو 1
        ]);

        // البحث عن الدورة بناءً على course_id
        $saveCoursesVisible = CoursesVisible::where('courses_id', $course_id)->first();

        if ($saveCoursesVisible) {
            // تحديث فقط حقل is_visible
            $saveCoursesVisible->update([
                'is_visible' => $request->input('is_visible'), // الحصول على القيمة من الـ request
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->back()->with('success', 'Visibility updated successfully.');
        }

        // إذا لم يتم العثور على الدورة
        return redirect()->back()->with('error', 'Course not found.');
    }

    public function AddAllCourses($userId)
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
