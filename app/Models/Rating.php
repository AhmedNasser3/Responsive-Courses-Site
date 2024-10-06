<?php

namespace App\Models;

use App\Models\User;
use App\Models\SubCourses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['rating_course_id', 'user_id', 'rating', 'comment'];

    public function product()
    {
        return $this->belongsTo(related: SubCourses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
