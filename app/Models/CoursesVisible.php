<?php

namespace App\Models;

use App\Models\SubSubCategory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoursesVisible extends Model
{
    use HasFactory;

    protected $table = 'courses_visible';

    protected $fillable = ['users_id', 'courses_id', 'is_visible', 'sub_id'];

    // علاقة مع المستخدم
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(){
    	return $this->belongsTo(User::class,'users_id',ownerKey: 'id');
    }
    public function users_id(){
    	return $this->belongsTo(User::class,'id',ownerKey: 'id');
    }

    public function subcategory_visible() {
        return $this->belongsTo(SubSubCategory::class, 'courses_id', 'id');
    }
    public function sub_id() {
        return $this->belongsTo(SubSubCategory::class, 'sub_id', 'id');
    }
}
