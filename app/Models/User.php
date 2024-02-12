<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'password',
        'user_password',
        'IsAdmin',
        'user_type',
        'grade',
        'group',
        'student_subscrip',
        'renew',
        'email',
        'Teacher_ratio_course',
        'teacher_description'

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function teacher()
    {
        return $this->hasMany(Course::class, 'techer_id', 'id');
    }
    public function teacherbook()
    {
        return $this->hasMany(Book::class, 'techer_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany(VideoComment::class, "user_id", "id");
    }

    public function cartitem()
    {
        return $this->hasMany(CartItem::class, "user_id", "id");
    }
    public function course()
    {
        return $this->belongsToMany(Course::class, 'user_courses', "user_id", "course_id", "id");
    }
    public function package()
    {
        return $this->belongsToMany(Package::class, 'user_packages', "user_id", "package_id", "id");
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function city()
    {
        return $this->belongsToMany(City::class, 'mandub_cities',"mandoub_id" ,"city_id" , "id");
    }
    public function mandubBooks()
    {
        return $this->belongsToMany(Book::class, 'mandub_books', "mandub_id", "book_id", "id")
            ->withPivot('mandub_quantity', 'minimum', 'station', 'distributor_active', 'mandub_active', 'mandub_target')
            ->withTimestamps();
    }

    public function order()
    {
        return $this->hasOne(OrderBookDetail::class, "mandub_id");
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
