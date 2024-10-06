<?php

namespace App\Http\Controllers\Admin\CoursesVisible;

use App\Models\CoursesVisible;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CoursesVisibleController extends Controller
{
    public function index()
    {
        $subCourses = CoursesVisible::orderBy('users_id')->orderBy('courses_id')->get();
        return view('Admin.visibality.index', ['subCourses' => $subCourses, 'users' => User::all()]);
    }

    public function show_courses($userId)
    {
        $subCourses = CoursesVisible::where('users_id', $userId)->get();
        $visible = CoursesVisible::where('users_id', $userId)->orderBy('courses_id')->get();
        return view('Admin.visibality.show_courses', compact('subCourses', 'visible', 'userId'))->with('users', User::all());
    }

    public function updateVisibility(Request $request, $courseId)
    {
        $request->validate([
            'users_id' => 'required',
            'courses_id' => 'required',
            'sub_id' => 'required',
            'is_visible' => 'required|boolean',
        ]);

        $saveCoursesVisible = CoursesVisible::where('courses_id', $courseId)
            ->where('users_id', $request->input('users_id'))
            ->first();

        if ($saveCoursesVisible) {
            $saveCoursesVisible->update(['is_visible' => $request->input('is_visible')]);
            return back()->with('success', 'تم تحديث الرؤية بنجاح.');
        }
        return back()->with('error', 'الدورة غير موجودة.');
    }

    public function AddAllCourses($userId)
    {
        $user = User::find($userId);
        if (!$user) return back()->with('error', 'المستخدم غير موجود.');

        $authUserCourses = CoursesVisible::where('users_id', Auth::id())->select('courses_id', 'sub_id')->distinct()->get();
        $newCoursesForUser = [];

        foreach ($authUserCourses as $course) {
            if (!CoursesVisible::where([['users_id', '=', $userId], ['courses_id', '=', $course->courses_id], ['sub_id', '=', $course->sub_id]])->exists()) {
                $newCoursesForUser[] = [
                    'users_id' => $userId,
                    'courses_id' => $course->courses_id,
                    'sub_id' => $course->sub_id,
                    'is_visible' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if ($newCoursesForUser) CoursesVisible::insert($newCoursesForUser);
        return back()->with('success', 'تمت إضافة جميع الكورسات بنجاح.');
    }

    public function UsersDelete($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف المستخدم بنجاح.');
    }
}
