<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Apiuser extends Authenticatable implements JWTSubject

{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

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


    public function getJWTIdentifier()   
   		{
       		return $this->getKey();
    	}

		public function getJWTCustomClaims()
    	{
        	return [];
    	}
}
