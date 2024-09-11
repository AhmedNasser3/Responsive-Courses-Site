<?php

namespace App\Models;

use App\Models\SubSubCategory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCourses extends Model
{
    use HasFactory;
    protected  $fillable = [
        'sub_sub_categories_id',
        'video',
        'title',
        'description',
    ];

    public function sub_subcategory(){
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_categories_id',ownerKey: 'id');
    }


}
