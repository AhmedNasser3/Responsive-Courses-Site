<?php

namespace App\Models;

use App\Models\SubCategory;
use App\Models\CoursesVisible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_categories_id',
        'title',
        'description',
        'sub_subcategories_slug',
    ];

    public function subcategory(){
    	return $this->belongsTo(SubCategory::class,'sub_categories_id','id');
    }

    // In SubSubCategory model
public function coursesVisibles()
{
    return $this->hasMany(CoursesVisible::class, 'courses_id');
}
}
