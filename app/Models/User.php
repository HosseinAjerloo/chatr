<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'family',
        'username',
        'side',
        'nationality',
        'phone_number',
        'city_id',
        'brand_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function roles(){
        return $this->belongsToMany(Role::class,'role_users','user_id','role_id','id','id')->withPivot('role_id');
    }
    public function photo(){
        return $this->morphOne(Fileable::class,'fileable','fileable_type','fileable_id');
    }
    public function fullName():Attribute{
      return  Attribute::make(fn()=>$this->name.' '.$this->family??'');
    }
}
