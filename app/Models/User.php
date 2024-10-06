<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\SubCourses;
use Illuminate\Support\Str;
use App\Models\CoursesVisible;
use App\Models\SubSubCategory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'web';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'unique_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function visibleCourses()
    {
        return $this->hasMany(SubSubCategory::class)
                    ->where('is_visible', 1);
    }

    public function subCategories()
    {
        return $this->hasMany(CoursesVisible::class, 'users_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->unique_code = $user->generateUniqueCode(); // Generate a numeric unique code
        });
    }

    /**
     * Generate a unique numeric code.
     *
     * @return string
     */
    protected function generateUniqueCode()
    {
        // Generate a numeric code with 10 digits
        return str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
    }
}
