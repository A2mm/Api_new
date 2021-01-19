<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'gender', 'date_of_birth', 'avatar', 'country_code', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

     public function getAvatarAttribute($value)
    {
        if($value != null)
        {
            return asset('public/uploads/user_images/'.$value);
        }
        else
        {
            return null;//asset('public/images/default_user.png');
        }
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function getPhoneNumberAttribute($value)
    {
        $item         = Country::where('iso', $this->country_code)->select('phonecode')->first();
        $len          = strlen($item->phonecode);
        $phone_number = substr($this->phone_number, $len);
        return $phone_number;
    }

}
