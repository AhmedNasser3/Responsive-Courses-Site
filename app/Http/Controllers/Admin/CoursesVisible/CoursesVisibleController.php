<?php

namespace App\Http\Controllers\Admin\CoursesVisible;

use App\Models\SubCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\SubCourseUserVisibility;

class CoursesVisibleController extends Controller
{
    public function index()
    {
        $subCourses = SubCourses::all();
        $users = User::all();
        return view('Admin.visibality.index', compact('subCourses', 'users'));
    }

    public function updateVisibility(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sub_courses_id' => 'required|exists:sub_courses,id',
            'is_visible' => 'required|boolean',
        ]);

        $userId = $request->input('user_id');
        $subCourseId = $request->input('sub_courses_id');
        $isVisible = $request->input('is_visible');

        // تحديث الرؤية
        DB::table('course_user_visibility')->updateOrInsert(
            ['user_id' => $userId, 'sub_courses_id' => $subCourseId],
            ['is_visible' => $isVisible]
        );

        return redirect()->back()->with('success', 'Visibility updated successfully.');
    }
}
