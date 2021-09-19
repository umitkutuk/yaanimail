<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'twitter_user_id',
        'email_verification_code',
        'phone_verification_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels user
     *
     * @var array
     */
    public static $labels = [
        'name' => 'Kullanıcı Adı',
        'email' => 'Email',
        'password' => 'Parola',
        'phone' => 'Telefon Numarası',
        'twitter_user_id' => 'Twitter Kullanıcı ID',
        'email_verified_at' => 'Email Onay Tarihi',
        'phone_verified_at' => 'Telefon Numarası Onay Tarihi',
    ];

    public function setEmailVerifiedAt(): void
    {
        $this->email_verified_at = now();
        $this->save();
    }

    public function setPhoneVerifiedAt(): void
    {
        $this->phone_verified_at = now();
        $this->save();
    }
}
