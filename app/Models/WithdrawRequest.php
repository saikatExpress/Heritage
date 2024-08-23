<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'amount',
        'status',
    ];

    /**
     * Get the user that owns the withdraw request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the files that include this withdraw request.
     */
    public function files()
    {
        return $this->belongsToMany(File::class, 'file_withdraw_request');
    }
}
