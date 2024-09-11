<?php

namespace App\Models;

use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_title',
        'category_description',
        'category_slug',
        'category_img',
    ];

    public function course()
    {
        return $this->belongsTo(SubSubCategory::class, 'courses_id');
    }
}
