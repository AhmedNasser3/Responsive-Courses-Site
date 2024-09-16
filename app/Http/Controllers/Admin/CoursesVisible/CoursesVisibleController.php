<?php

namespace App\Http\Controllers\Admin\CoursesVisible;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CoursesVisible;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

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
        $subCourses = CoursesVisible::where('users_id', $userId)->get();
        $visible = CoursesVisible::where('users_id', $userId)->orderBy('courses_id', 'asc')->get();
        $users = User::all();
        return view('Admin.visibality.show_courses', compact('subCourses', 'users', 'visible', 'userId'));
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

    public function AddAllCourses($userId)
    {
        // تحقق من وجود المستخدم
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // الحصول على جميع الكورسات الخاصة بالمستخدم الحالي
        $authUserCourses = CoursesVisible::where('users_id', Auth::id())
            ->select('courses_id', 'sub_id')
            ->distinct()
            ->get();

        // تحضير البيانات لإدخالها
        $newCoursesForUser = [];

        foreach ($authUserCourses as $course) {
            // تحقق من عدم وجود إدخالات مكررة للمستخدم الحالي
            $existingCourse = CoursesVisible::where([
                ['users_id', '=', $userId],
                ['courses_id', '=', $course->courses_id],
                ['sub_id', '=', $course->sub_id]
            ])->exists();

            // أضف الدورة إذا لم تكن موجودة بالفعل
            if (!$existingCourse) {
                $newCoursesForUser[] = [
                    'users_id' => $userId,
                    'courses_id' => $course->courses_id,
                    'sub_id' => $course->sub_id,
                    'is_visible' => 0, // تعيين الرؤية كما هو مطلوب
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // إدخال البيانات الجديدة في قاعدة البيانات
        if (count($newCoursesForUser) > 0) {
            CoursesVisible::insert($newCoursesForUser);
        }

        // إعادة التوجيه مع رسالة النجاح
        return redirect()->back()->with('success', 'All courses have been added for the user successfully.');
    }


    public function UsersDelete($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


}
