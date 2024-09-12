<?php

namespace App\Http\Controllers\Admin\CoursesVisible;

use App\Models\SubCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CoursesVisible;
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
            // تحديث البيانات
            $saveCoursesVisible->update([
                'users_id' => $request->input('users_id'),
                'courses_id' => $request->input('courses_id'),
                'sub_id' => $request->input('sub_id'),
                'is_visible' => $request->input('is_visible'), // الحصول على القيمة من الـ request
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->back()->with('success', 'Visibility updated successfully.');
        }

        // إذا لم يتم العثور على الدورة
        return redirect()->back()->with('error', 'Course not found.');
    }

}
