<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'role',
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

    /**
     * Get the withdraw requests for the user.
     */
    public function withdrawRequests()
    {
        return $this->hasMany(WithdrawRequest::class);
    }

    /**
     * Get the files created by the user in their various roles.
    */
    public function files()
    {
        return $this->hasMany(File::class, 'account_id')
                    ->orWhere('business_head_id', $this->id)
                    ->orWhere('ceo_id', $this->id)
                    ->orWhere('md_id', $this->id);
    }

    /**
     * Get the approvals given by the user.
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class, 'approved_by');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'owner_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'bidder_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'user_id');
    }
}
