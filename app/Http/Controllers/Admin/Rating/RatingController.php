<?php

namespace App\Http\Controllers\Admin\Rating;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function store(Request $request, $courseID)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $rating = new Rating();
        $rating->rating_course_id = $courseID;
        $rating->user_id = auth()->id();
        $rating->rating = $request->input('rating');
        $rating->comment = $request->input('comment');
        $rating->save();
        return redirect()->back()->with('success', 'Rating submitted successfully');
}
}
