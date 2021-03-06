<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];
    //country
    public function country(){
        return $this->hasOne(SubLocation::class, 'id', 'country_id');
    }
    //job
    public function jobs(){
        return $this->hasMany(Job::class);
    }
    public function withdraws(){
        return $this->hasMany(WithDraw::class);
    }
    public function deposit(){
        return $this->hasMany(ManualDeposit::class);
    }
    //cnty = 
    public function cnty(){
        return $this->belongsTo(SubLocation::class, 'country_id', 'id');
    }
}
