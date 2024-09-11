<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_title',
        'subcategory_description',
        'subcategory_slug',
        'subcategory_img',
    ];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

}
